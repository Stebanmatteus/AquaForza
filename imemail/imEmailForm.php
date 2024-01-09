<?php
if(substr(basename($_SERVER['PHP_SELF']), 0, 11) == "imEmailForm") {
	include '../res/x5engine.php';
	$form = new ImForm();
	$form->setField('Nombre', $_POST['imObjectForm_2_1'], '', false);
	$form->setField('Apellidos', $_POST['imObjectForm_2_2'], '', false);
	$form->setField('Comentarios', $_POST['imObjectForm_2_3'], '', false);
	$form->setField('E-Mail', $_POST['imObjectForm_2_4'], '', false);

	if(@$_POST['action'] != 'check_answer') {
		if(!isset($_POST['imJsCheck']) || $_POST['imJsCheck'] != 'jsactive' || (isset($_POST['imSpProt']) && $_POST['imSpProt'] != ""))
			die(imPrintJsError());
		$form->mailToOwner('aquaforza@hotmail.com', 'aquaforza@hotmail.com', '', 'Por favor de contactar para envio de información', false);
		$form->mailToCustomer('aquaforza@hotmail.com', $_POST['imObjectForm_2_4'], '', '', false);
		@header('Location: ../index.html');
		exit();
	} else {
		echo $form->checkAnswer(@$_POST['id'], @$_POST['answer']) ? 1 : 0;
	}
}

// End of file