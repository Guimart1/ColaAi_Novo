<?php 
    class User{
        public $id, $nome, $sobrenome, $email, $senha, $tel, $imagemPerfil, $imagemBanner;

        public function getId(){
            return $this->id;
        }
        public function setId($id){
            $this-> id = $id;
        }

        public function getNome(){
            return $this->nome;
        }
        public function setNome($nome){
            $this-> nome = $nome;
        }

        public function getSobrenome(){
            return $this->sobrenome;
        }
        public function setSobrenome($sobrenome){
            $this-> sobrenome = $sobrenome;
        }
        public function getEmail(){
            return $this->email;
        }
        public function setEmail($email){
            $this-> email = $email;
        }

        public function getSenha(){
            return $this->senha;
        }
        public function setSenha($senha){
            $this-> senha = $senha;
        }

        public function getTel(){
            return $this->tel;
        }
        public function setTel($tel){
            $this-> tel = $tel;
        }

        public function getImagemPerfil(){
            return $this->imagemPerfil;
        }
        public function setImagemPerfil($imagemPerfil){
            $this-> imagemPerfil = $imagemPerfil;
        }

        public function getImagemBanner(){
            return $this->imagemBanner;
        }
        public function setImagemBanner($imagemBanner){
            $this-> imagemBanner = $imagemBanner;
        }

        public function salvarImagem($novo_nome){
            if(empty($_FILES['foto']['size']) != 1){
                if($novo_nome == ""){
                    $novo_nome = md5(time()). ".jpg";
                }
                $diretorio = "../../img/Usuario/";
                $nomeCompleto = $diretorio.$novo_nome;
                move_uploaded_file($_FILES['foto']['tmp_name'], $nomeCompleto);
                return $novo_nome;
            }
            else{
                return $novo_nome;
            }
        }

        public function salvarBanner($novo_nome){
            if(empty($_FILES['banner']['size']) != 1){
                if($novo_nome == ""){
                    $novo_nome = md5(time()). ".jpg";
                }
                $diretorio = "../../img/Usuario/";
                $nomeCompleto = $diretorio.$novo_nome;
                move_uploaded_file($_FILES['banner']['tmp_name'], $nomeCompleto);
                return $novo_nome;
            }
            else{
                return $novo_nome;
            }
        }
    }

?>