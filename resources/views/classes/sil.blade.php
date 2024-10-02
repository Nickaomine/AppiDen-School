@extends('layout.base')
@section('content')

<div class="page-header">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{url('home')}}">Tableau de bord <i class="icon-home"></i></li></a></li>
		<li class="breadcrumb-item active">Sil</li>
	</ol>
</div>
<div class="main-container">
	<div class="row gutters">
		<div class="col-xl-12 ">
			<div class="table-container">
				<div class="row">
					<div class="col-md-9">
						<h3>Classe Sil </h3>
					</div>
					<div class="col-md-3">
						<span class="float-right">
							<button type="button" title="imprimer" class="btn btn-dark" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="icon-print"></i> Imprimer</button>
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lgAP"><i class="icon-person_add" title="ajouter un sil"></i> Ajouter</button>
						</span>
					</div>
				</div>
				<div class="row">

				</div>
			</div>
		</div>
		<div class="container">
			<form method="get" action="{{url('filtresil')}}" id="filterForm">
				@csrf
				<div class="row gutters">
					<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
						<div class="form-group">
						    <input type="text" class="form-control" id="inputName" name="nom" placeholder="entrer le nom de l'eleve" required>
						</div>
					</div>
					<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
						<div class="form-group">
							<button type="submit" class="btn btn-primary" title="recherche"><i class="icon-search"></i></button>
						</div>
					</div>
				</div>
			</form>
		</div>
		<div class="col-md-12">
			@if (session('status'))
			<div class=" alert alert-success">
				{{session('status')}}
			</div>
			@endif
			@if (session('error'))
			<div class=" alert alert-danger">
				{{session('error')}}
			</div>
			@endif
		</div>
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			<div class="table-container" id="tableContainer">
				<div class="table-responsive">
					<table class="table custom-table m-0">
						<thead>
							<tr>
								<th>#</th>
								<th>Nom</th>
								<th>Sexe</th>
								<th>Age</th>
								<th>Statut</th>
								<th>Prenom</th>
								<th>orphelin</th>
								<th>Matricule</th>
								<th>Adresse</th>
								<th>Numero Parent</th>
								<th>Etat</th>
								<th>Actions</th>
							</tr>
						</thead>

						<tbody>
							@php
							$count = 1;
							@endphp
							@if($sil->isEmpty())
							<tr>
								<td colspan="10" class="tabcenter">Aucun eleve trouver.</td>
							</tr>
							@else
							@foreach ($sil as $sil)
							<tr>
								<td>{{ $count }}</td>
								<td>{{$sil -> nom}}</td>
								<td>{{$sil -> sexe}}</td>
								<td>{{$sil -> age}}</td>
								<td>{{$sil -> statut}}</td>
								<td>{{$sil -> prenom}}</td>
								<td>{{$sil -> orphelin}}</td>
								<td>{{$sil -> matricule}}</td>
								<td>{{$sil -> adresse}}</td>
								<td>{{$sil -> numeroparent}}</td>
								<td>
									@if ($sil->etat === "present(e)")
									<span class="badge badge-primary" title="Eleve Present(e)"><i class="icon-check_circle"></i></span>
									@elseif ($sil->etat === "absent(e)")
									<span class="badge badge-danger" title="Eleve Absent(e)"><i class="icon-highlight_off"></i></span>
									@endif
								</td>
								<td>
									<a href="#" class="btn btn-primary  view-details" data-sil='{{ json_encode($sil) }}' data-toggle="modal" data-target="#infosleModal" title="voir les infos petite section"><i class="icon-eye"></i></a>
									<a data-toggle="modal" data-target=".bd-example-modal-lgMP" data-sil='{{ json_encode($sil) }}' class="btn btn-info btnModifPer" style="color: white;cursor: pointer;" title="modifier"><i class="icon-pencil"></i></a>
									<a href="{{url('deletesil/'. $sil -> silID)}}" class="btn btn-danger" onclick="return confirm('voulez vous vraiment supprimer?')" title="supprimer"><i class="icon-trash"></i></a>
								</td>
							</tr>
							@php
							$count++;
							@endphp
							@endforeach
							@endif
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

	<!--Modal pour ajouter un nouvelle  sil -->
	<div class="modal fade bd-example-modal-lgAP" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="myLargeModalLabel">Inscrit un Eleve</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="{{url('insertsil')}}" method="post" enctype="multipart/form-data">
						@csrf
						<div class=" row gutters">
							<div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-12">
								<div class="form-group">
									<label for="inputName">Nom</label>
									<input type="text" class="form-control" id="inputName" name="nom" required>
								</div>
							</div>
							<div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-12">
								<div class="form-group">
									<label for="inputEmail">Sexe</label>
                                    <select type="text" id="disabledInput" class="form-control" name="sexe" required>
										<option selected disabled>choisir</option>
										<option value="masculin">Masculin</option>
										<option value="feminin">Feminin</option>
									</select>
								</div>
							</div>
							<div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-12">
								<div class="form-group">
									<label for="inputPwd">Age</label>
									<input type="text" class="form-control" id="inputPwd" name="age" required>
								</div>
							</div>
							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
								<div class="form-group">
									<label for="inputReadOnly">Statut</label>
                                    <select type="text" id="disabledInput" class="form-control" name="statut" required>
										<option selected disabled>choisir</option>
										<option value="nouveau">Nouveau</option>
										<option value="nouvelle">Nouvelle</option>
										<option value="ancien">Ancien</option>
										<option value="ancienne">Ancienne</option>
									</select>
								</div>
							</div>
							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
								<div class="form-group">
									<label for="inputReadOnly">Prenom</label>
									<input class="form-control" id="inputReadOnly" type="text" name="prenom" required>
								</div>
							</div>
							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
								<div class="form-group">
									<label for="inputReadOnly">Orphelin</label>
                                    <select type="text" id="disabledInput" class="form-control" name="orphelin" required>
										<option selected disabled>choisir</option>
										<option value="oui">Oui</option>
										<option value="non">Non</option>
									</select>
								</div>
							</div>
							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
								<div class="form-group">
									<label for="inputReadOnly">Matricule</label>
									<input class="form-control" id="inputReadOnly" type="text" name="matricule" required>
								</div>
							</div>
							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
								<div class="form-group">
									<label for="inputReadOnly">Date Naissance</label>
									<input class="form-control" id="inputReadOnly" type="date" name="datenaissance" required>
								</div>
							</div>
							<div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-12">
								<div class="form-group">
									<label for="disabledInput">Lieu Naissance</label>
									<input type="text" id="disabledInput" class="form-control" name="lieunaissance" required>
								</div>
							</div>
							<div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-12">
								<div class="form-group">
									<label for="disabledInput">Numero Parent</label>
									<input type="text" id="disabledInput" class="form-control" name="numeroparent" required>
								</div>
							</div>
							<div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-12">
								<div class="form-group">
									<label for="disabledInput">Adresse</label>
									<input type="text" id="disabledInput" class="form-control" name="adresse" required>
								</div>
							</div>
							<div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-12">
								<div class="form-group">
									<label for="disabledInput">Etat</label>
									<select type="text" id="disabledInput" class="form-control" name="etat" required>
										<option selected disabled>choisir</option>
										<option value="present(e)">Present(e)</option>
										<option value="absent(e)">Absent(e)</option>
									</select>
								</div>
							</div>
						</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal"  onclick="return confirm('Voulez-vous vraiment annuler ?')">Close</button>
					<button type="submit" class="btn btn-primary">Save</button>
				</div>
			</div>
			</form>
		</div>
	</div>

	<!-- Modal pour modifier une sil-->.
	<div class="modal fade bd-example-modal-lgMP" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="myLargeModalLabel">Modification d'une Grande section</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
                <form action="{{url('updatesil')}}" method="post" enctype="multipart/form-data">
						@csrf
						<div class=" row gutters">
							<div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-12">
								<div class="form-group">
									<label for="inputName">Nom</label>
									<input type="text" class="form-control" id="inputName" name="nom" required>
									<input type="hidden" class="form-control" id="inputName" name="silID" required>
								</div>
							</div>
							<div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-12">
								<div class="form-group">
									<label for="inputEmail">Sexe</label>
                                    <select type="text" id="disabledInput" class="form-control" name="sexe" required>
										<option selected disabled>choisir</option>
										<option value="masculin">Masculin</option>
										<option value="feminin">Feminin</option>
									</select>
								</div>
							</div>
							<div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-12">
								<div class="form-group">
									<label for="inputPwd">Age</label>
									<input type="text" class="form-control" id="inputPwd" name="age" required>
								</div>
							</div>
							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
								<div class="form-group">
									<label for="inputReadOnly">Statut</label>
                                    <select type="text" id="disabledInput" class="form-control" name="statut" required>
										<option selected disabled>choisir</option>
										<option value="nouveau">Nouveau</option>
										<option value="nouvelle">Nouvelle</option>
										<option value="ancien">Ancien</option>
										<option value="ancienne">Ancienne</option>
									</select>
								</div>
							</div>
							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
								<div class="form-group">
									<label for="inputReadOnly">Prenom</label>
									<input class="form-control" id="inputReadOnly" type="text" name="prenom" required>
								</div>
							</div>
							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
								<div class="form-group">
									<label for="inputReadOnly">Orphelin</label>
                                    <select type="text" id="disabledInput" class="form-control" name="orphelin" required>
										<option selected disabled>choisir</option>
										<option value="oui">Oui</option>
										<option value="non">Non</option>
									</select>
								</div>
							</div>
							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
								<div class="form-group">
									<label for="inputReadOnly">Matricule</label>
									<input class="form-control" id="inputReadOnly" type="text" name="matricule" required>
								</div>
							</div>
							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
								<div class="form-group">
									<label for="inputReadOnly">Date Naissance</label>
									<input class="form-control" id="inputReadOnly" type="date" name="datenaissance" required>
								</div>
							</div>
							<div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-12">
								<div class="form-group">
									<label for="disabledInput">Lieu Naissance</label>
									<input type="text" id="disabledInput" class="form-control" name="lieunaissance" required>
								</div>
							</div>
							<div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-12">
								<div class="form-group">
									<label for="disabledInput">Numero Parent</label>
									<input type="text" id="disabledInput" class="form-control" name="numeroparent" required>
								</div>
							</div>
							<div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-12">
								<div class="form-group">
									<label for="disabledInput">Adresse</label>
									<input type="text" id="disabledInput" class="form-control" name="adresse" required>
								</div>
							</div>
							<div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-12">
								<div class="form-group">
									<label for="disabledInput">Etat</label>
									<select type="text" id="disabledInput" class="form-control" name="etat" required>
										<option selected disabled>choisir</option>
										<option value="present(e)">Present(e)</option>
										<option value="absent(e)">Absent(e)</option>
									</select>
								</div>
							</div>
						</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal"  onclick="return confirm('Voulez-vous vraiment annuler ?')">Close</button>
					<button type="submit" class="btn btn-primary">Save</button>
				</div>
			</div>
			</form>
		</div>
	</div>
	<script>
		// Écouteur d'événement pour le clic sur le bouton "Modifier"
		document.querySelectorAll('.btnModifPer').forEach(button => {
			button.addEventListener('click', function() {
				let silData = JSON.parse(this.getAttribute('data-sil'));

				console.log(silData); // Debugging pour voir les données
				console.log(silData.silID); // Debugging pour voir l'ID

				// Vérification si l'input est accessible
				let idInput = document.querySelector('.bd-example-modal-lgMP input[name="silID"]');
				if (idInput) {
					idInput.value = silData.silID; // ID
				} else {
					console.error("L'input ID n'a pas été trouvé.");
				}

				let silpermisInput = document.querySelector('.bd-example-modal-lgMP input[name="nom"]');
				if (silpermisInput) {
					silpermisInput.value = silData.nom; // ID
				} else {
					console.error("L'input permis n'a pas été trouvé.");
				}
				let silsexeInput = document.querySelector('.bd-example-modal-lgMP select[name="sexe"]');
				if (silsexeInput) {
					silsexeInput.value = silData.sexe; // ID
				} else {
					console.error("L'input sildateexpermis n'a pas été trouvé.");
				}
				let silageInput = document.querySelector('.bd-example-modal-lgMP input[name="age"]');
				if (silageInput) {
					silageInput.value = silData.age; // ID
				} else {
					console.error("L'input siltypepermis n'a pas été trouvé.");
				}
				let silstatutInput = document.querySelector('.bd-example-modal-lgMP select[name="statut"]');
				if (silstatutInput) {
					silstatutInput.value = silData.statut; // ID
				} else {
					console.error("L'input sildateembau n'a pas été trouvé.");
				}

				let silprenominput = document.querySelector('.bd-example-modal-lgMP input[name="prenom"]');
				if (silprenominput) {
					silprenominput.value = silData.prenom; // ID
				} else {
					console.error("L'input silimages n'a pas été trouvé.");
				}
				let silorphelininput = document.querySelector('.bd-example-modal-lgMP select[name="orphelin"]');
				if (silorphelininput) {
					silorphelininput.value = silData.orphelin; // ID
				} else {
					console.error("L'input statut n'a pas été trouvé.");
				}
				let silmatriculeinput = document.querySelector('.bd-example-modal-lgMP input[name="matricule"]');
				if (silmatriculeinput) {
					silmatriculeinput.value = silData.matricule; // ID
				} else {
					console.error("L'input statut n'a pas été trouvé.");
				}
				let sildatenaissanceinput = document.querySelector('.bd-example-modal-lgMP input[name="datenaissance"]');
				if (sildatenaissanceinput) {
					sildatenaissanceinput.value = silData.datenaissance; // ID
				} else {
					console.error("L'input statut n'a pas été trouvé.");
				}
				let sillieunaissanceinput = document.querySelector('.bd-example-modal-lgMP input[name="lieunaissance"]');
				if (sillieunaissanceinput) {
					sillieunaissanceinput.value = silData.lieunaissance; // ID
				} else {
					console.error("L'input statut n'a pas été trouvé.");
				}
				let silnumeroparentinput = document.querySelector('.bd-example-modal-lgMP input[name="numeroparent"]');
				if (silnumeroparentinput) {
					silnumeroparentinput.value = silData.numeroparent; // ID
				} else {
					console.error("L'input statut n'a pas été trouvé.");
				}
				let siladresseinput = document.querySelector('.bd-example-modal-lgMP input[name="adresse"]');
				if (siladresseinput) {
					siladresseinput.value = silData.adresse; // ID
				} else {
					console.error("L'input statut n'a pas été trouvé.");
				}
				let siletatinput = document.querySelector('.bd-example-modal-lgMP select[name="etat"]');
				if (siletatinput) {
					siletatinput.value = silData.etat; // ID
				} else {
					console.error("L'input statut n'a pas été trouvé.");
				}
			});
		});
	</script>

    <!-- Modal pour visualiser un silcule-->
	<div class="modal fade" id="infosleModal" tabindex="-1" role="dialog" aria-labelledby="silculeModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="silculeModalLabel">Informations sur l'eleve</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">

					<label for="inputPassword5" class="form-label">Nom </label>
					<p type="text" class="form-control" id="Name" style="width: 50%;text-align:center;color:blue;font-weight:bold">

					<div style="width: 50%;margin-top:-51px;margin-left:51%">
						<label for="inputPassword5" class="form-label">Sexe</label>
						<p type="text" id="sexe" class="form-control" style="text-align:center;color:blue;font-weight:bold">
					</div>

					<label for="inputPassword5" class="form-label">Age </label>
					<p type="text" class="form-control" id="age" style="width: 50%;text-align:center;color:blue;font-weight:bold">

					<div style="width: 50%;margin-top:-51px;margin-left:51%">
						<label for="inputPassword5" class="form-label">Statut</label>
						<p type="text" id="statut" class="form-control" style="text-align:center;color:blue;font-weight:bold">
					</div>
					<label for="inputPassword5" class="form-label">Prenom</label>
					<p type="text" class="form-control" id="prenom" style="width: 50%;text-align:center;color:blue;font-weight:bold">

					<div style="width: 50%;margin-top:-51px;margin-left:51%">
						<label for="inputPassword5" class="form-label">Orphelin</label>
						<p type="text" id="orphelin" class="form-control" style="text-align:center;color:blue;font-weight:bold">
					</div>

					<label for="inputPassword5" class="form-label">Matricule</label>
					<p type="text" class="form-control" id="matricule" style="width: 50%;text-align:center;color:blue;font-weight:bold">

					<div style="width: 50%;margin-top:-51px;margin-left:51%">
						<label for="inputPassword5" class="form-label">Date de naissance</label>
						<p type="date" id="datenaissance" class="form-control" style="text-align:center;color:blue;font-weight:bold">
					</div>

					<label for="inputPassword5" class="form-label">Lieu de naissance</label>
					<p type="text" class="form-control" id="lieunaissance" style="width: 50%;text-align:center;color:blue;font-weight:bold">

					<div style="width: 50%;margin-top:-51px;margin-left:51%">
						<label for="inputPassword5" class="form-label">Numero du parents</label>
						<p type="text" id="numeroparent" class="form-control" style="text-align:center;color:blue;font-weight:bold">
					</div>

					<label for="inputPassword5" class="form-label">Adresse</label>
					<p type="text" class="form-control" id="adresse" style="width: 50%;text-align:center;color:blue;font-weight:bold">

					<div style="width: 50%;margin-top:-51px;margin-left:51%">
						<label for="inputPassword5" class="form-label">Etat</label>
						<p type="text" id="etat" class="form-control" style="text-align:center;color:blue;font-weight:bold">
					</div>

					<label for="inputPassword5" class="form-label">Inscrit Le</label>
					<p type="text" class="form-control" id="created_at" style="width: 100%;text-align:center;color:blue;font-weight:bold">

				</div>
				<div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
				</div>
			</div>
		</div>
	</div>
	<script>
		document.addEventListener('DOMContentLoaded', function() {
			var viewDetailsButtons = document.getElementsByClassName('view-details');
			Array.from(viewDetailsButtons).forEach(function(button) {
				button.addEventListener('click', function() {
					var sil = JSON.parse(this.getAttribute('data-sil'));

					// Assurez-vous que les noms correspondent
					document.getElementById('Name').textContent = sil.nom;
					document.getElementById('sexe').textContent = sil.sexe;
					document.getElementById('age').textContent = sil.age;
					document.getElementById('statut').textContent = sil.statut;
					document.getElementById('prenom').textContent = sil.prenom;
					document.getElementById('orphelin').textContent = sil.orphelin;
					document.getElementById('matricule').textContent = sil.matricule;
					document.getElementById('datenaissance').textContent = sil.datenaissance;
					document.getElementById('lieunaissance').textContent = sil.lieunaissance;
					document.getElementById('numeroparent').textContent = sil.numeroparent;
					document.getElementById('adresse').textContent = sil.adresse;
					document.getElementById('created_at').textContent = sil.created_at;
					document.getElementById('etat').textContent = sil.etat;

					var modal = new bootstrap.Modal(document.getElementById('infosleModal'));
					modal.show();
				});
			});
		});
	</script>

	@endsection