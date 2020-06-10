<?php 

class Animal {
    public function emitirSom()
    {
        if (isset($this->som)) {
            echo $this->som;
        }
    }
}

class Cachorro extends Animal {
    protected $som = 'auau!';
}

class Vaca extends Animal {
    protected $som = 'muuuu!';
}

class Galinha extends Animal {
    protected $som = 'cócóricó!';
}

class Fazenda {

    private $animais = [
        'Cachorro',
        'Vaca',
        'Galinha'
    ];

    public function emitirSom($animal)
    {

        $animal = ucfirst(strtolower($animal));

        if (!in_array($animal, $this->animais)) {
            throw new InvalidArgumentException("Fazenda.class: tipo de 'animal' inválido!");
        }

        $animal = new $animal();
        $animal->emitirSom();
    }
}

$animal = $_GET['animal'] ?? null;
$fazenda = new Fazenda();
$fazenda->emitirSom($animal);