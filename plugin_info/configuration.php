<?php
/* This file is part of Jeedom.
*
* Jeedom is free software: you can redistribute it and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation, either version 3 of the License, or
* (at your option) any later version.
*
* Jeedom is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
* GNU General Public License for more details.
*
* You should have received a copy of the GNU General Public License
* along with Jeedom. If not, see <http://www.gnu.org/licenses/>.
*/

require_once dirname(__FILE__) . '/../../../core/php/core.inc.php';
include_file('core', 'authentification', 'php');
if (!isConnect()) {
  include_file('desktop', '404', 'php');
  die();
}
?>
<form class="form-horizontal">
  <fieldset>
    <div class="form-group">
      <label class="col-md-4 control-label">{{Login}}
        <sup><i class="fas fa-question-circle tooltips" title="{{Renseignez le login de votre compte Daikin}}"></i></sup>
      </label>
      <div class="col-md-4">
        <input class="configKey form-control" data-l1key="login"/>
      </div>
    </div>
    <div class="form-group">
      <label class="col-md-4 control-label">{{Mot de passe}}
        <sup><i class="fas fa-question-circle tooltips" title="{{Renseignez le mot de passe de votre compte Daikin}}"></i></sup>
      </label>
      <div class="col-md-4">
        <input class="configKey form-control" data-l1key="password"/>
      </div>
    </div>
	<div class="form-group">
		<label class="col-sm-4 control-label">{{Equipements enregistrés}}</label>
		<div class="col-sm-2">
			<a class="btn btn-default" id="bt_createEq" ><i class="fas fa-cogs"></i> {{Lancer la création}}</a>
		</div>
	</div>
  </fieldset>
</form>
<script>
  $('#bt_createEq').on('click', function () {
    bootbox.confirm('{{Etes-vous sûr de vouloir installer/mettre à jour vos équipements ? }}', function (result) {
      if (result) {
        $('#md_modal').dialog({title: "{{Installation / Mise à jour ! Veuillez patienter jusqu\'à l\'apparition du message de fin}}"});
        $('#md_modal').load('index.php?v=d&plugin=daikin-residential-controller-cloud&modal=modal.config.createeq').dialog('open');
      }
    });
  });
</script>