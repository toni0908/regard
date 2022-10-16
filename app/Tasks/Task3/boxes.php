<?php
if (!function_exists('getResult')) {
    /**
     * @throws Exception
     */
   function getResult(array $boxes, int $weight): int
   {
       //Если вес хоть одной из коробок не int
       array_walk( $boxes,function ($value){
          if (!is_int($value)) throw new \Exception('Not integer weight of one box');
       });

       //Сортируем массив по возрастанию, и сбиваем ключи
       asort($boxes);
       $boxes = array_values($boxes);

       $leftBorderNum = 0;
       $rightBorderNum = array_key_last($boxes);
       $boxesCount = 0;

       while($leftBorderNum < $rightBorderNum){

           //Две коробки в сумме дают точный вес для курьера, сдвигаем обе границы
           $currentBoxesWeight = $boxes[$leftBorderNum]+$boxes[$rightBorderNum];
           if ($currentBoxesWeight == $weight){
               $leftBorderNum++;
               $rightBorderNum--;
               $boxesCount++;
           } elseif ($currentBoxesWeight < $weight){
               //Сумма меньше нужного веса, сдвигаем левую границу (увеличиваем суммарный вес)
               $leftBorderNum++;
           } else {
               //Если сумма больше нужного веса, то сдвигаем правую границу (уменьшаем суммарный вес)
               $rightBorderNum--;
           }
       }

      return $boxesCount;
   }
}
