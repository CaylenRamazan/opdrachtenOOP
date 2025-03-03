<?php
class Figure {
    protected string $color;

    public function __construct(string $color) {
        $this->color = $color;
    }

    public function getColor(): string {
        return $this->color;
    }

    public function draw(): string {
        return "";
    }
}

class Triangle extends Figure {
    private int $width;
    private int $height;

    public function __construct(string $color, int $height, int $width) {
        parent::__construct($color);
        $this->height = $height;
        $this->width = $width;
    }

    public function draw(): string {
       
        $x1 = 0;
        $y1 = $this->height;
        $x2 = $this->width;
        $y2 = $this->height;
        $x3 = $this->width / 2;
        $y3 = 0;

        return "<polygon points='$x1,$y1 $x2,$y2 $x3,$y3' fill='{$this->color}' />";
    }
}

class Circle extends Figure {
    private int $radius;

    public function __construct(string $color, int $radius) {
        parent::__construct($color);
        $this->radius = $radius;
    }

    public function draw(): string {
        return "<circle cx='{$this->radius}' cy='{$this->radius}' r='{$this->radius}' fill='{$this->color}' />";
    }
}

class Square extends Figure {
    private int $size;

    public function __construct(string $color, int $size) {
        parent::__construct($color);
        $this->size = $size;
    }

    public function draw(): string {
        return "<rect width='{$this->size}' height='{$this->size}' fill='{$this->color}' />";
    }
}

class Rectangle extends Figure {
    private int $width;
    private int $height;

    public function __construct(string $color, int $width, int $height) {
        parent::__construct($color);
        $this->width = $width;
        $this->height = $height;
    }

    public function draw(): string {
        return "<rect width='{$this->width}' height='{$this->height}' fill='{$this->color}' />";
    }
}
