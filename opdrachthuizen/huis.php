<?php
class Room {
    private float $length;
    private float $width;
    private float $height;

    public function __construct(float $length, float $width, float $height) {
        $this->length = $length;
        $this->width = $width;
        $this->height = $height;
    }

    public function getLength(): float {
        return $this->length;
    }

    public function getWidth(): float {
        return $this->width;
    }

    public function getHeight(): float {
        return $this->height;
    }

    public function getVolume(): int {
        return (int) ($this->length * $this->width * $this->height);
    }
}

class House {
    private array $rooms = [];
    private const PRICE_PER_M3 = 1500;

    public function addRoom(Room $room): void {
        $this->rooms[] = $room;
    }

    public function getRooms(): array {
        return $this->rooms;
    }

    public function getTotalVolume(): int {
        $totalVolume = 0;
        foreach ($this->rooms as $room) {
            $totalVolume += $room->getVolume();
        }
        return $totalVolume;
    }

    public function getPrice(): float {
        return $this->getTotalVolume() * self::PRICE_PER_M3;
    }

    public function showDetails(): void {
        echo "Aantal kamers: " . count($this->rooms) . "<br>";
        echo "Totaal volume: " . $this->getTotalVolume() . " m³<br>";
        echo "Totale prijs: €" . number_format($this->getPrice(), 2) . "<br>";
        echo "Details per kamer:<br>";

        foreach ($this->rooms as $index => $room) {
            echo "Kamer " . ($index + 1) . ": ";
            echo "Lengte: " . $room->getLength() . "m, ";
            echo "Breedte: " . $room->getWidth() . "m, ";
            echo "Hoogte: " . $room->getHeight() . "m, ";
            echo "Volume: " . $room->getVolume() . "m³<br>";
        }
        echo "<br>";
    }
}


?>

