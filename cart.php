<?php

class Cart {

  /**
   * Holds the songs that will be shown on the card
   * 
   * @var array
   */
  private $songs = array(); 

  /**
   * Constructor
   *
   * Stores 25 songs that will be displayed
   * 
   * @throws Exception
   * @return void
   */
  public function __construct($songArray)
  {
    if (count($songArray) <= 25) {
      throw new Exception('Too few songs to generate random cards');
    }

    while(count($this->songs) < 25) {
      shuffle($songArray);

      if (!in_array($songArray[0], $this->songs) &&
          $songArray[0] != '') {
        $this->songs[] = array_shift($songArray);
      }
    }
  }

  /**
   * Gets the HTML table for the cart
   *
   * @return string
   * @param string $htmlClass
   */
  public function getHTML($htmlClass)
  {
    $htmlString = '';

    $htmlString .= "<table class='{$htmlClass}'><tr>";

    for ($i = 0; $i < 25; $i++) {
      
      // Because we start counting with zero, check if a tr-tag has to be added
      if ($i % 5 == 0 && $i > 0) {
        $htmlString .= "</tr><tr>";
      } 

      $htmlString .= "<td>";
      $htmlString .= $this->songs[$i];
      $htmlString .= "</td>";
    }

    return $htmlString;
  }
}
