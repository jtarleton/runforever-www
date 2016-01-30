<?php


class Carousel 
{
  private $data,
          $format,
          $slides,
          $html;
  /** 
   * Constructor
   */
  public function __construct(array $data, $format=null) {
    $this->html = '';
    if(!isset($format)){
      $this->format=<<<EOD
      <div class="item%s">%s<br />
        %s
      <br />
      <div class="carousel-caption">
        %s
      </div>
      </div>
EOD;
    }
    $this->slides = $data;
    $this->init();
  }

  public static function get(array $data, $format=null) {
    return new Carousel($data, $format);
  }

  public function init() {

    $this->html .=<<<EOD
      <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
EOD;

   $i=0;


    
   foreach($this->slides as $slide) {
      $active = '';
      if($i==0) {
        $active = ' active';
      }
     
   
      $this->html.='<li data-target="#carousel-example-generic" data-slide-to="' . $i . '" class="'.$active.'"></li>';
    $i++;
    }

    $this->html.='</ol>
      <!-- Wrapper for slides  -->
      <div class="carousel-inner" role="listbox">';

    $i=0;
    foreach($this->slides as $slide) {
      $active = '';
      if($i==0) {
        $active = ' active';
      }
      $this->html.=sprintf($this->format, $active, $slide->getSlideTitle(), $slide->getSlideBody(), $slide->getSlideCaption());
      $i++;
    }

    $this->html .=<<<EOD
        </div>
        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
        </div>
EOD;
  }

  public function render() {
    echo $this->html;
  }
}
