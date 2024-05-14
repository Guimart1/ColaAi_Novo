	//***********************************
	// Exibir modal de excluir 
	//***********************************
  function modalRemover($id, $elemento){
		const myModal = new bootstrap.Modal('#modalExcluir');
		myModal.show();
		document.getElementById($elemento).value = $id;
		//window.location.href = "./registro.php";
		}

	function modalInfo($id, $elemento){
		const myModal = new bootstrap.Modal('#modalInfo');
		myModal.show();
		document.getElementById($elemento).value = $id;
		//window.location.href = "./registro.php";
		}
	function modalInfoPubli($id, $elemento){
		const myModal = new bootstrap.Modal('#modalInfoPubli');
		myModal.show();
		document.getElementById($elemento).value = $id;
		//window.location.href = "./registro.php";
		}
	function modalInfoEvento($id, $elemento){
		const myModal = new bootstrap.Modal('#modalInfoEvento');
		myModal.show();
		document.getElementById($elemento).value = $id;
		//window.location.href = "./registro.php";
		}

	function modalAceitar(id, elemento){
		const myModal = new bootstrap.Modal('#modalAceitar');
		myModal.show();
		document.getElementById(elemento).value = id;
		//window.location.href = "./registro.php";
		}
	function modalArquivar(id, elemento){
		const myModal = new bootstrap.Modal('#modalArquivar');
		myModal.show();
		document.getElementById(elemento).value = id;
		//window.location.href = "./registro.php";
		}
	function modalRestaurar($id, $elemento){
		const myModal = new bootstrap.Modal('#modalRestaurar');
		myModal.show();
		document.getElementById($elemento).value = $id;
		//window.location.href = "./registro.php";
		}
        function modalSobre() {
            const myModal = new bootstrap.Modal('#modalSobre');
            myModal.show();
            //window.location.href = "./registro.php";
        }

        function modalFeedback($id, $elemento) {
            const myModal = new bootstrap.Modal('#modalFeedback');
            myModal.show();
            document.getElementById($elemento).value = $id;
            //window.location.href = "./registro.php";
        }

        function modalContato($id, $elemento) {
            const myModal = new bootstrap.Modal('#modalContato');
            myModal.show();
            document.getElementById($elemento).value = $id;
            //window.location.href = "./registro.php";
        }

		function modalFotoPerfil($id, $elemento) {
            const myModal = new bootstrap.Modal('#modalFotoPerfil');
            myModal.show();
            //window.location.href = "./registro.php";
        }

		function modalBannerPerfil($id, $elemento) {
            const myModal = new bootstrap.Modal('#modalBannerPerfil');
            myModal.show();
            //window.location.href = "./registro.php";
        }

		function modalDadosPessoais($id, $elemento) {
            const myModal = new bootstrap.Modal('#modalDadosPessoais');
            myModal.show();
            document.getElementById($elemento).value = $id;
            //window.location.href = "./registro.php";
        }
		function modalSeguindo($id, $elemento) {
            const myModal = new bootstrap.Modal('#modalSeguindo');
            myModal.show();
            document.getElementById($elemento).value = $id;
            //window.location.href = "./registro.php";
        }
  $(document).ready(function() {
    $('#modalPadrao').modal('show');
  });

