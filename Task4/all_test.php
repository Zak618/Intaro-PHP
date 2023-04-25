<?php 
error_reporting(E_ERROR | E_PARSE);

require_once "./sol_task1.php";
require_once "./sol_task2.php";
require_once "./sol_task3.php";
require_once "./sol_task4.php";

// Тестирование данных, которые загружаются из файла по 1 строке
// Входные данные:
// solveFunction - название функции, которую необходимо протестировать
// dataPath - путь к файлу с входными данными для тестирования
// answerPath - путь к файлу с выходными данными для тестирования
// Выходные данные: 
// boolean - успешно ли прошел тест
function testByLines($solveFunction, $dataPath, $answerPath): bool
{
	$dataLines = file($dataPath);
	$answerLines = file($answerPath);

	foreach ($dataLines as $i => $line) {
		$line = trim($line);
		$answer = trim($answerLines[$i]);

		$result = $solveFunction($line);
		if ($result !== $answer) {
			return false;
		}
	}
	return true;
}

// Тестирование данных, которые загружаются из файла целиком
// Входные данные:
// solveFunction - название функции, которую необходимо протестировать
// dataPath - путь к файлу с входными данными для тестирования
// answerPath - путь к файлу с выходными данными
// Выходные данные: 
// boolean - успешно ли прошел тест
function testWholeFile($solveFunction, $dataPath, $answerPath): bool{
	$line = file_get_contents($dataPath);
	$answer = file_get_contents($answerPath);
	$result = $solveFunction($line);
	if ($solveFunction == "task1"){ // в первом таске есть лишние символы (кроме букв и цифер)
		return preg_replace('\W','', $result) === preg_replace('\W','', $answer);
	}

	return $result === $answer;
}

// Тестирование данных для 3 задания
// Оценка точности данных производится тестировщиком.
// Входные данные:
// solveFunction - название функции, которую необходимо протестировать
// dataPath - путь к файлу с входными данными для тестирования
// answerPath - путь к файлу с выходными данными
// Выходные данные: 
// true - тест дошел до конца и все данные были выведены в консоль
function testTask3($solveFunction, $dataPath, $answerPath): bool{
	$line = file_get_contents($dataPath);
	$answer = file_get_contents($answerPath);
	$result = $solveFunction($line);
	$answer_arr = explode("\n", $answer);
	$i = 0;
	foreach($answer_arr as $answer){
		echo "\nProgramm answer: " . $result[$i] . "Answer from ans: " . $answer;
		$i++;
	}
	echo "\n";
	return true;
}

// Входная точка для начала тестирования
// Определяется необходимая для тестирования функция из тех двух, что написаны выше
// Также осуществляет вывод результата в консоль
// Входные данные:
// taskToTest - номер задания, которое нужно протестировать
// solveFunction - название функции, которую необходимо протестировать
// isByLine - определяет какой именно тест должен проходить
// если isByLine == 1, то функция для тестирования - testByLines
// если isByLine == 0, то функция для тестирования - testWholeFile
function testFiles($taskToTest, $solveFunction, $isByLines){
	echo '--------------------------Тестирование задачи №' . $taskToTest . ":\n";

	$dataFilesDir = './' . $taskToTest . '/dat/'; 
	$answerFilesDir = './' . $taskToTest . '/ans/'; 

	if($isByLines == 1 || $isByLines == 0 ){
		$testFunction = $isByLines ? 'testTask3' : 'testWholeFile'; 
	}

	$dataPaths = scandir($dataFilesDir);
	$answerPaths = scandir($answerFilesDir);

	for ($i=2; $i < count($dataPaths); $i++) {
		$testResult = true;
		$testResult = $testFunction(
			$solveFunction,
			$dataFilesDir . $dataPaths[$i], 
			$answerFilesDir . $answerPaths[$i]
		);
		echo "******** Тест " . ($i-1) . ($testResult ? ' ' : ' не ') . "пройден\n";
	}
	echo "\n";
}

testFiles('1', 'task1', 0);
testFiles('2', 'task2', 0);
testFiles('3', 'task3', 1);
testFiles('4', 'task4', 0);