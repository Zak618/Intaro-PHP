<?php

// Класс для оптимизации css
// Некоторые пункты оптимизации/минимизации были вынесены в отдельные методы, так как по смыслу их можно применять и в других случаях
// Основные пункты минимизации находятся внутри метода optimize
class СssOptimizer{                                                                         // (индекс у кода и имени цвета одинаковый)
    private $color_hexs = ["#CD853F",'#FFC0CB','#DDA0DD','#FF0000','#FFFAFA','#D2B48C'];    // коды цветов 
    private $color_names = ["peru", "pink", "plum", "red","snow", "tan"];                   // имена цветов  
    private $property_patterns = [                                                          // регулярки для поиска маржинов и паддингов
        "-top:(-?[0-9]{1,10}p?x?",                                                          // top
        "-right:(-?[0-9]{1,10}p?x?",                                                        // right
        "-bottom:(-?[0-9]{1,10}p?x?",                                                       // bottom
        "-left:(-?[0-9]{1,10}p?x?"                                                          // left
    ];
    private $css;                                                                           // css для минимизации
    
    public function __construct($css){
        $this->css = $css;
    }

    // метод для оптимизации цветов
    // меняет все заданные по условию и захардкоженные цвета
    // находит те, что содержат 3 идущих подряд пары одинаковых символов и сокращает их по 1 символу с каждой пары
    // например #FF00AA -> #F0A
    private function clearColor(){
        $this->css = str_replace($this->color_hexs, $this->color_names, $this->css);
        preg_match_all('/#([0-9A-z])[0-9A-z]([0-9A-z])[0-9A-z]([0-9A-z])[0-9A-z]/', $this->css, $colors);
        $colors=$colors[0];
        $col_patterns=$colors;
        foreach ($col_patterns as &$col){
            $col="/".$col."/";
        }
        foreach ($colors as &$color){
            $new="#";
            for($i=1;$i<strlen($color)-1;$i+=2){
                if($color[$i]==$color[$i+1]){
                    $new.=$color[$i];
                }
            }
            if(strlen($new)==4){
                $color=$new;
            }
        }
        $this->css=preg_replace($col_patterns, $colors, $this->css);

        preg_match_all('/#([0-9A-z])[0-9A-z]([0-9A-z])[0-9A-z]([0-9A-z])[0-9A-z]/', $this->css, $colors);
    }

    // метод для удаления всех возможных лишних пробелов, переносов строк и тд перед оптимизацией
    // изменяет $this->css 
    // удаляет все возможные переносы строк, табы, пробелы после символов-разделителей
    private function deleteSpace(){
        $css = str_replace(array("\r\n","\n\r", "\r", "\n", "\t", '  ', '    ', '    '), '', $this->css);
        $this->css = preg_replace("/( |), /", ',', $this->css);
        $this->css = str_replace('; ', ';', $this->css);
        $this->css = str_replace(': ', ':', $this->css);
        $this->css = str_replace(' {', '{', $this->css);
        $this->css = str_replace(' > ', '>', $this->css);
    }

    // метод для упрощения margin и padding
    // Входные данные:
    // $lines - массив свойств внутри {} в описании стилей, разбитый по строкам
    // $property - имя свойства, может принимать значения margin или padding
    // Результат работы - изменяет массив $line таким образом, чтобы внутри не было лишних margine/padding
    private function cleanMarginPadding(&$lines, $property){
        $up = array();                                      // все найденные верхние отступы
        $right = array();                                   // все найденные правые отступы
        $bottom = array();                                  // все найденные нижние отступы
        $left = array();                                    // все найденные левые отступы
        foreach($lines as &$line){                          // поик свойств, привязанных к стороне отступа
            $up = preg_match('/'. $property . $this->property_patterns[0] . ")/", $line, $up) ? $up[1] : NULL;
            $right = preg_match('/'. $property . $this->property_patterns[1] . ")/", $line, $right) ? $right[1] : NULL;
            $bottom = preg_match('/'. $property . $this->property_patterns[2] . ")/", $line, $bottom) ? $bottom[1] : NULL;
            $left = preg_match('/'. $property . $this->property_patterns[3] . ")/", $line, $left) ? $left[1] : NULL;

            if(strpos($line,  $property )!==false){         // удаление повторяющихся через : свойств
                $line=substr_replace($line, $property . ':'. $property ,strpos($line, $property), strlen($property));
            }                                               
            $line=preg_replace('/'. $property . $this->property_patterns[0] .';?)/', '', $line); //удаление лишшних свойств
            $line=preg_replace('/'. $property . $this->property_patterns[1] .';?)/', '', $line);
            $line=preg_replace('/'. $property . $this->property_patterns[2] .';?)/', '', $line);
            $line=preg_replace('/'. $property . $this->property_patterns[3] .';?)/', '', $line);
            $to_replace="";

            if(isset($up)&&isset($right)&&isset($left)&&isset($bottom)){          //Когда есть отступы по всем сторонам
                if($up==$right&&$bottom==$left&&$up==$bottom&&$right==$left){
                    $line=preg_replace('/'. $property . ':/', ''. $property . ':'.$up.';', $line); 
                }
                else if($up==$bottom&&$right==$left){
                    $line=preg_replace('/'. $property . ':/', ''. $property . ':'.$up.' '.$right.';', $line);
                }
                else if($up!=$bottom&&$right==$left){
                    $line=preg_replace('/'. $property . ':/', ''. $property . ':'.$up.' '.$right.' '.$bottom.';', $line);
                }
                else{
                    $line=preg_replace('/'. $property . ':/', ''. $property . ':'.$up.' '.$right.' '.$bottom.' '.$left.';', $line);
                }
            }
            else if(!isset($up)&&!isset($right)&&!isset($left)&&!isset($bottom)){ // Когда нет отступов
                $line=preg_replace('/'. $property . ':'. $property . ':/', ''. $property . ':', $line);
            }
            else {                                                                // Все возможные остальные случаи
                $line=preg_replace('/'. $property . ':'. $property . ':/', ''. $property . ':', $line);
                if(isset($up)){
                    $to_replace.=''. $property . '-top:'.$up.';';
                }
                if(isset($right)){
                    $to_replace.=''. $property . '-right:'.$right.';';
                }
                if(isset($bottom)){
                    $to_replace.=''. $property . '-bottom:'.$bottom.';';
                }
                if(isset($left)){
                    $to_replace.=''. $property . '-left:'.$left.';';
                }
                
                $line=preg_replace('/'. $property . ':/', $to_replace, $line);
            }
        }
    }

    // удаляет все комментации в css
    private function deleteComments(){
        $this->css = preg_replace('#//.[0,]#','',$this->css);
        $this->css = preg_replace('#/\*(?:[^*]*(?:\*(?!/))*)*\*/#','',$this->css);
    }

    // метод для удаления лищних единиц измерения
    // например px, rem, vw
    private function cleanUnits($unit){
        $this->css = preg_replace("/:( |)0" . $unit . "/", ":0", $this->css);
        $this->css = str_replace(" 0" . $unit, " 0", $this->css); 
    }

    // метод оптимизации css, внутри которого вызываются все необходимые для оптимизации методы
    // заточен под конкретные условия оптимизации, указанные в задании:
    // удаление комментариев, пробелов, оптимизация цветов, удаление лишних единиц измерения у нулей
    // удаление пустых свойств
    // уменьшение margin и padding
    // удаления оставшихся символов после оптимизации (могли появиться новые ; или пробелы, или табы и тд)
    public function optimizе(){
        $this->deleteSpace();
        $this->deleteComments();
        $this->clearColor();

        $this->cleanUnits("px");
        $this->cleanUnits("vw");
        $this->cleanUnits("rem");

        $this->css = preg_replace('/[#.]?[a-zA-Z0-9]{1,10}>[0,1][#.]?[a-zA-Z0-9]{1,10}{}/', "", $this->css); 

        preg_match_all('/{([^}]*)}/', $this->css, $lines);
        $lines=$lines[1];
        $reg_patterns=$lines;
        foreach($reg_patterns as &$pattern){
            $pattern='/'.$pattern.'/';
        }

        $this->cleanMarginPadding($lines, "margin");
        $this->cleanMarginPadding($lines, "padding");
        $this->css=preg_replace($reg_patterns, $lines, $this->css);

        $this->css = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $this->css);
        $this->css = preg_replace('/;}/', "}", $this->css);
        $this->css = preg_replace('/[#.]?[a-zA-Z0-9]{1,10}>?[#.]?[a-zA-Z0-9]{1,10}{}/', "", $this->css);
        $this->css = preg_replace("/^[0-9]$/", "", $this->css);
        return $this->css;
    }
}

// Решение задания 4 с помощью класса 
// Входные данные: строка с полной информацией о содержимом файла
// Выходные данные: строка с оптимизированным css
function task4($file){
    $cssOptimizer = new СssOptimizer($file);
    return $cssOptimizer->optimizе();
}