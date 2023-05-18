<?php

namespace App\Controller;

use App\Entity\Book;
use App\Entity\User;
use App\Form\BookFormType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\AsciiSlugger;

class MainController extends AbstractController
{
    // обработка главной страницы
    #[Route('/', name: 'app_main')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $books = $doctrine->getRepository(Book::class)->findAllOrderedByDateDESC();

        return $this->render('main/index.html.twig', [
            'books' => $books,
        ]);
    }
    // обработка страницы добавления книги
    #[Route('/add_book', name: 'app_add_book')]
    public function addBook(ManagerRegistry $doctrine, Request $request, $book = null): Response
    {

        if ($book == null) {
            $book = new Book();
        }

        $form = $this->createForm(BookFormType::class, $book);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $book = $form->getData();
            $book->setReader($this->container->get('security.token_storage')->getToken()->getUser());
            $book->setDate(
                date_create_from_format('d/M/Y H:i:s',
                    date('d/M/Y H:i:s',
                        strtotime($request->request->get("date"))
                    )
                )
            );

            $bookFile = $form->get('file')->getData();

            $slugger = new AsciiSlugger();

            if ($bookFile) {
                $originalFilename = pathinfo($bookFile->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename =  $slugger->slug($originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$bookFile->guessExtension();

                try {
                    $bookFile->move(
                        'files',
                        $newFilename
                    );
                }
                catch (FileException $e) {
                }

                $book->setFile($newFilename);
            }

            $coverFile = $form->get('cover')->getData();

            if ($coverFile) {
                $originalFilename = pathinfo($coverFile->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$coverFile->guessExtension();

                try {
                    $coverFile->move(
                        'covers',
                        $newFilename
                    );
                }
                catch (FileException $e) {
                }

                $book->setCover($newFilename);
            }

            $em = $doctrine->getManager();
            $em->persist($book);
            $em->flush();
            return $this->redirectToRoute('app_book', (['id' => $book->getId()]));
        }

        return $this->renderForm('main/add_book.html.twig', [
            'bookForm' => $form,
            'date' => $book->getDate()
        ]);
    }

    // обработка детальной страницы книги
    #[Route('/book/{id}', name: 'app_book')]
    public function book(Book $book, ManagerRegistry $doctrine, Request $request): Response
    {

        return $this->renderForm('main/book.html.twig', [
            'book' => $book
        ]);
    }
    // загрузка файла с книгой
    #[Route('/download/{id}', name: 'download')]
    public function download(Book $book): Response
    {
        header("Content-type:application/pdf");

        header("Content-Disposition:attachment;filename=" . $book->getName() . ".pdf");

        readfile('files/'. $book->getFile());
        return $this->redirectToRoute('app_book', ['id' => $book->getId()]);
    }
    // удаление книги
    #[Route('/delete/{id}', name: 'delete')]
    public function delete(Book $book, ManagerRegistry $doctrine): Response
    {
        $em = $doctrine->getManager();
        $em->remove($book);
        $em->flush();

        return $this->redirectToRoute('app_main');
    }

    // обработка страницы редактирования книги
    #[Route('/edit/{id}', name: 'edit')]
    public function edit(Book $book, ManagerRegistry $doctrine, Request $request): Response
    {
        return $this->addBook($doctrine, $request, $book);

    }
}
