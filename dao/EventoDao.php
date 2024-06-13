<?php 
require_once (__DIR__ . '../../model/Conexao.php');

    class EventoDao{
        public static function insert($evento){
            $nome = $evento->getNome();
            $cep = $evento->getCep();
            $endereco = $evento->getEndereco();
            $numero = $evento->getNumero();
            $complemento = $evento->getComplemento();
            $bairro = $evento->getBairro();
            $cidade = $evento->getCidade();
            $uf = $evento->getUf();
            $data = $evento->getData();
            $dataFim = $evento->getDataFim();
            $faixaEtaria = $evento->getFaixaEtaria();
            $periodo = $evento->getPeriodoEvento();
            $valor = $evento->getValor();
            $espaco = $evento->getEspaco();
            $desc = $evento->getDesc();
            $idOrganizacaoEvento = $evento->getIdOrganizacaoEvento(); 
            $imagem = $evento->getImagemEvento();
            $situacaoEvento = 1;
            
            $conn = Conexao::conectar(); // Estabeleça a conexão com o banco de dados
        
            $stmt = $conn->prepare("INSERT INTO tbevento (nomeEvento, cepEvento, enderecoEvento, numeroEvento, complementoEvento, bairroEvento, cidadeEvento, ufEvento,
            dataEvento, dataFimEvento, faixaEtariaEvento, periodoEvento, valorEvento, espacoEvento, descEvento, idOrganizacaoEvento, imagemEvento, idSituacaoEvento)  VALUES (:nome, :cep, :endereco, :numero, :complemento, :bairro, :cidade, :uf, :data,:dataFim, :faixa, :periodo, :valor,:espaco, :desc, :idOrgEvento, :imagem, :situacao)");
        
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':cep', $cep);
            $stmt->bindParam(':endereco', $endereco);
            $stmt->bindParam(':numero', $numero);
            $stmt->bindParam(':complemento', $complemento);
            $stmt->bindParam(':bairro', $bairro);
            $stmt->bindParam(':cidade', $cidade);
            $stmt->bindParam(':uf', $uf);
            $stmt->bindParam(':data', $data);
            $stmt->bindParam(':dataFim', $dataFim);
            $stmt->bindParam(':faixa', $faixaEtaria);
            $stmt->bindParam(':periodo', $periodo);
            $stmt->bindParam(':valor', $valor);
            $stmt->bindParam(':espaco', $espaco);
            $stmt->bindParam(':desc', $desc);
            $stmt->bindParam(':idOrgEvento', $idOrganizacaoEvento);
            $stmt->bindParam(':imagem', $imagem);
            $stmt->bindParam(':situacao', $situacaoEvento);
        
            $result = $stmt->execute();
        
            if ($result) {
                return true; // Inserção bem-sucedida
            } else {
                return false; // Erro na inserção
            }
        }
        
        
        public static function selectAll(){
            $conexao = Conexao::conectar();
            $query = "SELECT * FROM tbevento";
            $stmt = $conexao->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll();
        }

        public static function selectAllActive(){
            $conexao = Conexao::conectar();
            $query = "SELECT * FROM tbevento WHERE idSituacaoEvento = 1";
            $stmt = $conexao->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll();
        }
        public static function selectAllFiled(){
            $conexao = Conexao::conectar();
            $query = "SELECT * FROM tbevento WHERE idSituacaoEvento = 2";
            $stmt = $conexao->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll();
        }

        public static function selectAllFiltros($faixaEtaria, $turno, $valor){
            $conexao = Conexao::conectar();
            $query = "SELECT * FROM tbevento";
            if(!empty($faixaEtaria) || !empty($turno) || !empty($valor)){
                $query .= " WHERE";
                if(!empty($faixaEtaria)){
                    if(count($faixaEtaria) == 1){
                        $query.= " faixaEtariaEvento = :faixaEtaria";
                    } elseif(count($faixaEtaria) == 2){
                        $query .= " (faixaEtariaEvento = :faixaEtaria OR faixaEtariaEvento = :faixaEtaria2)";
                    } elseif(count($faixaEtaria) == 3){
                        $query .= " (faixaEtariaEvento = :faixaEtaria OR faixaEtariaEvento = :faixaEtaria2 OR faixaEtariaEvento = :faixaEtaria3)";
                    } elseif(count($faixaEtaria) == 4){
                        $query .= " (faixaEtariaEvento = :faixaEtaria OR faixaEtariaEvento = :faixaEtaria2 OR faixaEtariaEvento = :faixaEtaria3 OR faixaEtariaEvento = :faixaEtaria4)";
                    } else {
                        $query .= " (faixaEtariaEvento = 1 OR faixaEtariaEvento = 2 OR faixaEtariaEvento = 3 OR faixaEtariaEvento = 4 OR faixaEtariaEvento = 5)";
                    }
                } else {
                    $query .= " (faixaEtariaEvento = 1 OR faixaEtariaEvento = 2 OR faixaEtariaEvento = 3 OR faixaEtariaEvento = 4 OR faixaEtariaEvento = 5)";
                }
                if(!empty($turno)){
                    if(count($turno) == 2){
                        $query .= " AND (periodoEvento = :turno1 OR periodoEvento = :turno2)";
                    } elseif(count($turno) == 1){
                        $query .= " AND periodoEvento = :turno1";
                    } else {
                        $query .= " AND (periodoEvento = 1 OR periodoEvento = 2 OR periodoEvento = 3)";
                    }
                } else {
                    $query .= " AND (periodoEvento = 1 OR periodoEvento = 2 OR periodoEvento = 3)";
                }
                if(!empty($valor)){
                    if(count($valor) == 1){
                        $query .= " AND valorEvento = :valor";
                    } else {
                        $query .= " AND (valorEvento = 1 OR valorEvento = 2)";
                    }
                } else {
                    $query .= " AND (valorEvento = 1 OR valorEvento = 2)";
                }
            }
            $stmt = $conexao->prepare($query);
            if(!empty($faixaEtaria)){
                if(count($faixaEtaria) == 1){
                    $stmt->bindValue(':faixaEtaria', $faixaEtaria[0]);
                } elseif(count($faixaEtaria) == 2){
                    $stmt->bindValue(':faixaEtaria', $faixaEtaria[0]);
                    $stmt->bindValue(':faixaEtaria2', $faixaEtaria[1]);
                } elseif(count($faixaEtaria) == 3){
                    $stmt->bindValue(':faixaEtaria', $faixaEtaria[0]);
                    $stmt->bindValue(':faixaEtaria2', $faixaEtaria[1]);
                    $stmt->bindValue(':faixaEtaria3', $faixaEtaria[2]);
                } elseif(count($faixaEtaria) == 4){
                    $stmt->bindValue(':faixaEtaria', $faixaEtaria[0]);
                    $stmt->bindValue(':faixaEtaria2', $faixaEtaria[1]);
                    $stmt->bindValue(':faixaEtaria3', $faixaEtaria[2]);
                    $stmt->bindValue(':faixaEtaria4', $faixaEtaria[3]);
                }
            }
            if (!empty($turno)) {
                if (count($turno) == 2) {
                    $stmt->bindValue(':turno1', $turno[0]);
                    $stmt->bindValue(':turno2', $turno[1]);
                } elseif (count($turno) == 1) {
                    $stmt->bindValue(':turno1', $turno[0]);
                }
            }
            if(!empty($valor)){
                if(count($valor) == 1){
                    $stmt->bindValue(':valor', $valor[0]);
                }
            }
            $stmt->execute();
            return $stmt->fetchAll();
        }

        public static function selectById($id){
            $conexao = Conexao::conectar();
            $query = "SELECT * FROM tbevento WHERE idEvento = :id";
            $stmt = $conexao->prepare($query);
            $stmt->bindParam(':id', $id,  PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);

        }

        public static function delete($id){
            $conexao = Conexao::conectar();
            $query = "DELETE FROM tbevento WHERE idEvento = :id";
            $stmt = $conexao->prepare($query);
            $stmt->bindParam(':id', $id);
            return  $stmt->execute();

        }

        public static function update($id, $evento){
            $conexao = Conexao::conectar();
        
            $query = "UPDATE tbevento SET 
               nomeEvento = :nome, 
               cepEvento = :cep, 
               enderecoEvento = :endereco,
               numeroEvento = :numero,
               complementoEvento = :complemento,
               bairroEvento = :bairro,
               cidadeEvento = :cidade,
               ufEvento = :uf,
               dataEvento = :data,
               dataFimEvento = :dataFim,
               faixaEtariaEvento = :faixa,
               periodoEvento = :periodo,
               valorEvento = :valor,
               espacoEvento = :espaco,
               descEvento = :desc, 
               idOrganizacaoEvento = :idOrgEvento,
               imagemEvento = :imagem
                WHERE idEvento = :id";
            
            $stmt = $conexao->prepare($query);
        
            // Atribuir os valores a variáveis antes de chamar bindParam
            $nome = $evento->getNome();
            $cep = $evento->getCep();
            $endereco = $evento->getEndereco();
            $numero = $evento->getNumero();
            $complemento = $evento->getComplemento();
            $bairro = $evento->getBairro();
            $cidade = $evento->getCidade();
            $uf = $evento->getUf();
            $data = $evento->getData();
            $dataFim = $evento->getDataFim();
            $faixaEtaria = $evento->getFaixaEtaria();
            $periodo = $evento->getPeriodoEvento();
            $valor = $evento->getValor();
            $espaco = $evento->getEspaco();
            $desc = $evento->getDesc();
            $idOrganizacaoEvento = $evento->getIdOrganizacaoEvento();
            $imagem = $evento->getImagemEvento();

            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':cep', $cep);
            $stmt->bindParam(':endereco', $endereco);
            $stmt->bindParam(':numero', $numero);
            $stmt->bindParam(':complemento', $complemento);
            $stmt->bindParam(':bairro', $bairro);
            $stmt->bindParam(':cidade', $cidade);
            $stmt->bindParam(':uf', $uf);
            $stmt->bindParam(':data', $data);
            $stmt->bindParam(':dataFim', $dataFim);
            $stmt->bindParam(':faixa', $faixaEtaria);
            $stmt->bindParam(':periodo', $periodo);
            $stmt->bindParam(':valor', $valor);
            $stmt->bindParam(':espaco', $espaco);
            $stmt->bindParam(':desc', $desc);
            $stmt->bindParam(':idOrgEvento', $idOrganizacaoEvento);
            $stmt->bindParam(':imagem', $imagem);
            $stmt->bindParam(':id', $id);
        
            return $stmt->execute();
        }
        public static function selectByOrganizacaoIdActive($idOrganizacao){
            $conexao = Conexao::conectar();
            $query = "SELECT * FROM tbevento WHERE idOrganizacaoEvento = :idOrganizacao AND idSituacaoEvento = 1";
            $stmt = $conexao->prepare($query);
            $stmt->bindParam(':idOrganizacao', $idOrganizacao, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll();
        }
        public static function selectByOrganizacaoIdFiled($idOrganizacao){
            $conexao = Conexao::conectar();
            $query = "SELECT * FROM tbevento WHERE idOrganizacaoEvento = :idOrganizacao AND idSituacaoEvento = 2";
            $stmt = $conexao->prepare($query);
            $stmt->bindParam(':idOrganizacao', $idOrganizacao, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll();
        }
        
        public static function countEventsLast30Days(){
            // Data atual
            $dataAtual = date('Y-m-d');
        
            // Data de 30 dias atrás
            $data30DiasAtras = date('Y-m-d', strtotime('-30 days'));
        
            $conexao = Conexao::conectar();
            $query = "SELECT COUNT(*) AS totalEventos FROM tbevento WHERE dataEvento BETWEEN :data30DiasAtras AND :dataAtual";
            $stmt = $conexao->prepare($query);
            $stmt->bindParam(':data30DiasAtras', $data30DiasAtras);
            $stmt->bindParam(':dataAtual', $dataAtual);
            $stmt->execute();
            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        
            return $resultado['totalEventos'];
        }

        public static function selecionarEventoComOrganizacaoPorId($id){
            $conexao = Conexao::conectar();
            $query = "SELECT e.*, o.nomeOrganizacaoEvento, o.imagemOrganizacaoEvento 
                      FROM tbevento e
                      INNER JOIN tborganizacaoevento o ON e.idOrganizacaoEvento = o.idOrganizacaoEvento
                      WHERE e.idEvento = :id";
            $stmt = $conexao->prepare($query);
            $stmt->bindParam(':id', $id,  PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
        
        public static function updateSituacao($id, $evento){
            $conexao = Conexao::conectar();
        
            $query = "UPDATE tbevento SET 
                idSituacaoEvento = :situacao
                WHERE idEvento = :id";
            
            $stmt = $conexao->prepare($query);
        
            // Atribuir os valores a variáveis antes de chamar bindParam
            $situacao = $evento->getSituacaoEvento();

            $stmt->bindParam(':situacao', $situacao);
            $stmt->bindParam(':id', $id);
        
            return $stmt->execute();
        }
        public static function countTotalEvents(){
            $conexao = Conexao::conectar();
            $query = "SELECT COUNT(*) AS totalEventos FROM tbevento";
            $stmt = $conexao->prepare($query);
            $stmt->execute();
            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
    
            return $resultado['totalEventos'];
        }
        public static function getLastFiveEvents()
        {
            $conexao = Conexao::conectar();
            $query = "SELECT e.nomeEvento, o.nomeOrganizacaoEvento 
                      FROM tbevento e 
                      JOIN tborganizacaoevento o ON e.idOrganizacaoEvento = o.idOrganizacaoEvento 
                      ORDER BY e.idEvento DESC 
                      LIMIT 5";
            $stmt = $conexao->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }


?>