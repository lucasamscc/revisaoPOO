<?php

    class Fabricante{
        private $nome;

        public function __construct($nome)
        {
            $this->nome = $nome;
        }

        /**
         * @return mixed
         */
        public function getNome()
        {
            return $this->nome;
        }
    }
    class Produto{
        private $descricao;
        private $preco;
        private $fabricante;

        public function __construct($descricao, $preco, Fabricante $fabricante)
        {
            $this->preco = $preco;
            $this->descricao = $descricao;
            $this->fabricante = $fabricante;

        }

        public function getDetalhes()
        {
            return "O produto {$this->descricao} custa {$this->preco} reais\nFabricante: {$this->fabricante->getNome()}";
        }

        /**
         * @param mixed $descricao
         */
        public function setDescricao($descricao)
        {
            $this->descricao = $descricao;
        }

        /**
         * @param mixed $preco
         */
        public function setPreco($preco)
        {
            $this->preco = $preco;
        }
    }

    $f1 = new Fabricante('Editora B');
    $p2 = new Produto('DVD', 20, $f1 );

    echo $p2->getDetalhes();