<?php

namespace App\Form;

use App\Entity\Book;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use \Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\WeekType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\SubmitButton;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class BookFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'attr' => [
                    'class' => 'form-control mb-3',
                    'placeholder' => 'Введите название книги...'
                ],
                'label' => 'Название'
            ])
            ->add('author', TextType::class, [
                'attr' => [
                    'class' => 'form-control mb-3',
                    'placeholder' => 'Введите автора книги...'
                ],
                'label' => 'Автор'
            ])
            ->add('cover', FileType::class, [
                'label' => 'Обложка (jpg или png файл)',

                'mapped' => false,

                'attr' => [
                    'class' => 'form-control'
                ],


                'required' => false,

                'constraints' => [
                    new File([
                        'maxSize' => '5120k',
                        'mimeTypes' => [
                            'image/png',
                            'image/jpg',
                            'image/jpeg',
                        ],
                        'mimeTypesMessage' => 'Пожалуйста, загрузите jpg или png документ.',
                    ])
                ],
            ])
            ->add('file',  FileType::class, [
                'label' => 'Книга (PDF файл)',

                'mapped' => false,

                'attr' => [
                    'class' => 'form-control'
                ],


                'required' => false,

                'constraints' => [
                    new File([
                        'maxSize' => '5120k',
                        'mimeTypes' => [
                            'application/pdf',
                            'application/x-pdf',
                        ],
                        'mimeTypesMessage' => 'Пожалуйста, загрузите PDF документ.',
                    ])
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Book::class,
        ]);
    }
}
