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
if (!isConnect('admin')) {
	throw new Exception('{{401 - Accès non autorisé}}');
}
?>
<div id='div_configcreateeq' style="display: none;"></div>
<!--a class="btn btn-warning pull-right" data-state="1" id="bt_harmonyLogStopStart"><i class="fa fa-pause"></i> {{Pause}}</a>
<input class="form-control pull-right" id="in_harmonyLogSearch" style="width : 300px;" placeholder="{{Rechercher}}" /-->
Login : <?=config::byKey('login', 'daikin-residential-controller-cloud')?><br/>
<pre id='pre_daikinconfig' style='overflow: auto; height: 90%;with:90%;'>
<?php
if (!file_exists('./plugins/daikin-residential-controller-cloud/3rdparty/Apollon77-daikin-controller-cloud/tokenset.json')) {
  echo "Récupération d''un token de connexion";
  $request_shell = new com_shell('whoami;cd ./plugins/daikin-residential-controller-cloud/3rdparty/Apollon77-daikin-controller-cloud;node example/tokensaver.js ' . config::byKey('login', 'daikin-residential-controller-cloud') . ' ' . config::byKey('password', 'daikin-residential-controller-cloud') . ' 2>&1');
  log::add('daikin-residential-controller-cloud', 'debug', 'Execution de : ' . $request_shell->getCmd());
  $result = trim($request_shell->exec());
  log::add('daikin-residential-controller-cloud', 'debug', 'Résultat : ' . $result);
}
$request_shell = new com_shell('cd ./plugins/daikin-residential-controller-cloud/3rdparty/Apollon77-daikin-controller-cloud;node example/example.js 2>&1');
$result = trim($request_shell->exec());
log::add('daikin-residential-controller-cloud', 'debug', 'Résultat : ' . $result);
?>
<?=$result?>
</pre>
<!--script>
	$('#pre_daikinconfig').text('########Recherche de la config en cours########\n');
</script-->