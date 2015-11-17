<?php $this->layout('front_layout', ['title' => 'Réservation', 'page' => 6]) ?>

<?php $this->start('main_content') ?>

	<form class="form-horizontal formReservation" id="formReservationPersonalInformations">

		<fieldset class="col-lg-12">

		    <legend>Informations personnelles</legend>

		    <div class="form-group">
		    	<label class="col-lg-3 control-label">
		    		Civilité
		    	</label>
		    	<div class="col-lg-9">
		    		<div class="radio">
			    	    <label for="optionsCivility1">
			    	      <input name="civility" id="optionsCivility1" value="1" type="radio" <?php if(isset($session['user']['civility']) && $session['user']['civility'] == 1){ echo "checked"; } ?>>
			    	      M.
			    	    </label>
		    		</div>
		    		<div class="radio">
			    	    <label for="optionsCivility2">
			    	      <input name="civility" id="optionsCivility2" value="2" type="radio" <?php if(isset($session['user']['civility']) && $session['user']['civility'] == 2){ echo "checked"; } ?>>
			    	      Mme
			    	    </label>
		    		</div>
		    		<div class="radio">
			    	    <label for="optionsCivility3">
			    	      <input name="civility" id="optionsCivility3" value="3" type="radio" <?php if(isset($session['user']['civility']) && $session['user']['civility'] == 3){ echo "checked"; } ?>>
			    	      Melle
			    	    </label>
		    		</div>
		    	</div>
		    </div>

		    <div class="form-group">
		    	<label for="inputName" class="col-lg-3 control-label">
		    		Nom
		    		<span class="compulsory">
		    			*
		    			<span>Champ obligatoire</span>
		    		</span>
		    	</label>
		    	<div class="col-lg-9">
		        	<input class="form-control" id="inputName" name="name" placeholder="Nom" type="text" <?php if(isset($session['user']['name'])){ echo 'value="' . $session['user']['name'] . '"'; } ?>>
		    	</div>
		    	<span class="col-lg-9 col-lg-offset-3 errorSpan" id="errorSpanName"></span>
		    </div>

		    <div class="form-group">
		    	<label for="inputFirstName" class="col-lg-3 control-label">
		    		Prénom
		    	</label>
		    	<div class="col-lg-9">
		        	<input class="form-control" id="inputFirstName" name="firstName" placeholder="Prénom" type="text" <?php if(isset($session['user']['firstName'])){ echo 'value="' . $session['user']['firstName'] . '"'; } ?>>
		    	</div>
		    </div>

		    <div class="form-group">
		    	<label for="inputPhoneNumber" class="col-lg-3 control-label">
		    		Téléphone
		    		<span class="compulsory">
		    			*
		    			<span>Champ obligatoire</span>
		    		</span>
		    	</label>
		    	<div class="col-lg-9">
		        	<input class="form-control" id="inputPhoneNumber" name="phoneNumber" placeholder="Téléphone" type="text" <?php if(isset($session['user']['phoneNumber'])){ echo 'value="' . $session['user']['phoneNumber'] . '"'; } ?>>
		    	</div>
		    	<span class="col-lg-9 col-lg-offset-3 errorSpan" id="errorSpanPhoneNumber"></span>
		    </div>

		    <div class="form-group">
		    	<label for="inputEmail" class="col-lg-3 control-label">
		    		Email
		    		<span class="compulsory">
		    			*
		    			<span>Champ obligatoire</span>
		    		</span>
		    	</label>
		    	<div class="col-lg-9">
		        	<input class="form-control" id="inputEmail" name="email" placeholder="Email" type="text" <?php if(isset($session['user']['email'])){ echo 'value="' . $session['user']['email'] . '"'; } ?>>
		    	</div>
		    	<span class="col-lg-9 col-lg-offset-3 errorSpan" id="errorSpanEmail"></span>
		    </div>

		    <div class="form-group">
		    	<label for="inputAddress" class="col-lg-3 control-label">
		    		Adresse
		    	</label>
		    	<div class="col-lg-9">
		        	<input class="form-control" id="inputAddress" name="address" placeholder="Adresse" type="text" <?php if(isset($session['user']['address'])){ echo 'value="' . $session['user']['address'] . '"'; } ?>>
		    	</div>
		    </div>

		    <!-- <div class="form-group">
		    	<label for="inputAddress" class="col-lg-3 control-label">
		    		Adresse
		    	</label>
		    	<div class="col-lg-9">
		        	<input class="form-control" id="inputAddress" name="address" placeholder="Adresse" type="text" <?php if(isset($session['user']['address'])){ echo 'value="' . $session['user']['address'] . '"'; } ?>>
		    	</div>
		    </div>
		    
		    <div class="form-group">
		    	<label for="inputCity" class="col-lg-3 control-label">
		    		Ville
		    	</label>
		    	<div class="col-lg-9">
		        	<input class="form-control" id="inputCity" name="city" placeholder="Ville" type="text" <?php if(isset($session['user']['city'])){ echo 'value="' . $session['user']['city'] . '"'; } ?>>
		    	</div>
		    </div>
		    
		    <div class="form-group">
		    	<label for="inputZipcode" class="col-lg-3 control-label">
		    		Code postal
		    	</label>
		    	<div class="col-lg-9">
		        	<input class="form-control" id="inputZipcode" name="zipcode" placeholder="Code postal" type="text" <?php if(isset($session['user']['zipcode'])){ echo 'value="' . $session['user']['zipcode'] . '"'; } ?>>
		    	</div>
		    </div> -->

	    	<div class="col-lg-12 btnDiv">
	        	<button class="btn btn-default btnJS" id="btnCancelFormReservationPersonalInformations" data-ajax-path="<?= $this->url('unsetSessionUser'); ?>">Vider les champs des informations personnelles</button>
	        </div>

		</fieldset>

	</form>

	<form class="form-horizontal formReservation" id="formReservationRequest">

		<fieldset class="col-lg-12">

			<legend>Votre demande</legend>

		    <div class="form-group">
		    	<label for="selectGenre" class="col-lg-3 control-label">
		    		Choix de la prestation
		    		<span class="compulsory">
		    			*
		    			<span>Champ obligatoire</span>
		    		</span>
		    	</label>
		    	<div class="col-lg-9">
		        	<select class="form-control" id="selectGenre" name="category">
		        		<option class="defaultOption" value="0">Choisir la prestation demandée</option>
		        		<option value="1" <?php if(isset($session['request']['genre']) && $session['request']['genre'] == 1){ echo "selected"; } ?>>Transfert</option>
		        		<option value="2" <?php if(isset($session['request']['genre']) && $session['request']['genre'] == 2){ echo "selected"; } ?>>Mise à disposition</option>
		        		<option value="3" <?php if(isset($session['request']['genre']) && $session['request']['genre'] == 3){ echo "selected"; } ?>>Excursion</option>
		        		<option value="4" <?php if(isset($session['request']['genre']) && $session['request']['genre'] == 4){ echo "selected"; } ?>>Conciergerie</option>
		        	</select>
		    	</div>
		    	<span class="col-lg-9 col-lg-offset-3 errorSpan" id="errorSpanGenre"></span>
		    </div>

		    <div class="form-group">
		    	<label for="selectModel" class="col-lg-3 control-label">
		    		Choix du véhicule
		    		<span class="compulsory">
		    			*
		    			<span>Champ obligatoire</span>
		    		</span>
		    	</label>
		    	<div class="col-lg-9">
		        	<select class="form-control" id="selectModel" name="model">

		        		<option class="defaultOption" value="0">Choisir le véhicule désiré</option>

<?php 	foreach($carSelectData as $arrayCarsByGenre){		?>

						<optgroup label="<?= $this->e($arrayCarsByGenre['genre']) ?>">

<?php 		foreach($arrayCarsByGenre['cars'] as $car){		?>

							<option value="<?= $this->e($car['id']) ?>" <?php if(isset($session['request']['car']) && $session['request']['car'] == $this->e($car['id'])){ echo "selected"; } ?>><?= $this->e($car['brand']) ?> <?= $this->e($car['model']) ?></option>

<?php 		}												?>

						</optgroup>

<?php }														?>

		        	</select>
		    	</div>
		    </div>

			<div class="form-group">
				<label for="inputDate" class="col-lg-3 control-label">
					Date de la prestation
					<span class="compulsory">
						*
						<span>Champ obligatoire</span>
					</span>
				</label>
				<div class="col-lg-9">
					<div class="input-group date">
					    <input type="text" class="form-control" value="<?= date('d/m/Y') ?>" id="inputDate" name="date" placeholder="<?= date('d/m/Y') ?>">
					    <div class="input-group-addon">
					        <a class="showCalendar" href="#"><span class="glyphicon glyphicon-calendar"></span></a>
					    </div>
					</div>
				</div>
				<span class="col-lg-9 col-lg-offset-3 errorSpan" id="errorSpanDate"></span>
			</div>

		    <div class="form-group hiddenFormGroup formGroupTransfert  formGroupDisposition formGroupExcursion formGroupConciergerie">
		    	<label for="inputOrigin" class="col-lg-3 control-label">
		    		Lieu de prise en charge
		    		<span class="compulsory">
		    			*
		    			<span>Champ obligatoire</span>
		    		</span>
		    	</label>
		    	<div class="col-lg-9">
		        	<input class="form-control" id="inputOrigin" name="origin" placeholder="Départ" type="text">
		    	</div>
		    	<span class="col-lg-9 col-lg-offset-3 errorSpan" id="errorSpanOrigin"></span>
		    </div>

		    <div class="form-group hiddenFormGroup formGroupTransfert formGroupDisposition">
		    	<label for="inputDestination" class="col-lg-3 control-label">
		    		Lieu de dépose
		    		<span class="compulsory">
		    			*
		    			<span>Champ obligatoire</span>
		    		</span>
		    	</label>
		    	<div class="col-lg-9">
		        	<input class="form-control" id="inputDestination" name="destination" placeholder="Arrivée" type="text">
		    	</div>
		    	<span class="col-lg-9 col-lg-offset-3 errorSpan" id="errorSpanDestination"></span>
		    </div>


		    <div class="form-group hiddenFormGroup formGroupTransfert">
		    	<label for="textArea" class="col-lg-3 control-label">
		    		Message
		    	</label>
		    	<div class="col-lg-9">
		        	<textarea class="form-control" rows="3" id="textArea" name="message"></textarea>
		    	</div>
		    </div>

			










		    <!-- <div class="form-group">
		      <label for="inputPassword" class="col-lg-3 control-label">Password</label>
		      <div class="col-lg-9">
		        <input class="form-control" id="inputPassword" placeholder="Password" type="password">
		        <div class="checkbox">
		          <label>
		            <input type="checkbox"> Checkbox
		          </label>
		        </div>
		      </div>
		    </div>
		    <div class="form-group">
		      <label for="textArea" class="col-lg-3 control-label">Textarea</label>
		      <div class="col-lg-9">
		        <textarea class="form-control" rows="3" id="textArea"></textarea>
		        <span class="help-block">A longer block of help text that breaks onto a new line and may extend beyond one line.</span>
		      </div>
		    </div>
		    <div class="form-group">
		      <label class="col-lg-3 control-label">Radios</label>
		      <div class="col-lg-9">
		        <div class="radio">
		          <label>
		            <input name="optionsRadios" id="optionsRadios1" value="option1" checked="" type="radio">
		            Option one is this
		          </label>
		        </div>
		        <div class="radio">
		          <label>
		            <input name="optionsRadios" id="optionsRadios2" value="option2" type="radio">
		            Option two can be something else
		          </label>
		        </div>
		      </div>
		    </div>
		     -->

			

			<div class="col-lg-12 btnDiv">
		    	<button class="btn btn-default btnJS" id="btnCancelFormReservationRequest" data-ajax-path="<?= $this->url('unsetSessionRequest'); ?>">Vider les champs de votre demande</button>
		    </div>

		</fieldset>

	</form>

    <div class="col-lg-12 btnDiv">
    	<button  class="btn btn-primary btnJS" id="btnSubmitFormReservation" data-ajax-path="<?= $this->url('validateReservation') ?>">Soumettre</button>
		<div class="alert alert-dismissible alert-success" id="responseFormReservation">
		</div>
    </div>

    <script type="text/javascript" src="<?= $this->assetUrl('js/myForm.js') ?>"></script>
	
<?php $this->stop('main_content') ?>