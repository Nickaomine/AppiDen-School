@extends('layout.base')
@section('content')

<div class="page-header">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{url('home')}}">Tableau de bord <i class="icon-home"></i></li></a></li>
		<li class="breadcrumb-item active">Cours Elementaire 2(ce2)</li>
	</ol>
</div>
<div class="main-container">
	<div class="row gutters">
		<div class="col-xl-12 ">
			<div class="table-container">
				<div class="row">
					<div class="col-md-9">
						<h3>Classe ce2 </h3>
					</div>
					<div class="col-md-3">
						<span class="float-right">
							<button type="button" title="imprimer" class="btn btn-dark" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="icon-print"></i> Imprimer</button>
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lgAP"><i class="icon-person_add" title="ajouter un ce2"></i> Ajouter</button>
						</span>
					</div>
				</div>
				<div class="row">

				</div>
			</div>
		</div>
		<div class="container">
			<form method="get" action="{{url('filtrece2')}}" id="filterForm">
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
							@if($ce2->isEmpty())
							<tr>
								<td colspan="10" class="tabcenter">Aucun eleve trouver.</td>
							</tr>
							@else
							@foreach ($ce2 as $ce2)
							<tr>
								<td>{{ $count }}</td>
								<td>{{$ce2 -> nom}}</td>
								<td>{{$ce2 -> sexe}}</td>
								<td>{{$ce2 -> age}}</td>
								<td>{{$ce2 -> statut}}</td>
								<td>{{$ce2 -> prenom}}</td>
								<td>{{$ce2 -> orphelin}}</td>
								<td>{{$ce2 -> matricule}}</td>
								<td>{{$ce2 -> adresse}}</td>
								<td>{{$ce2 -> numeroparent}}</td>
								<td>
									@if ($ce2->etat === "present(e)")
									<span class="badge badge-primary" title="Eleve Present(e)"><i class="icon-check_circle"></i></span>
									@elseif ($ce2->etat === "absent(e)")
									<span class="badge badge-danger" title="Eleve Absent(e)"><i class="icon-highlight_off"></i></span>
									@endif
								</td>
								<td>
									<a href="#" class="btn btn-primary  view-details" data-ce2='{{ json_encode($ce2) }}' data-toggle="modal" data-target="#infosleModal" title="voir les infos petite section"><i class="icon-eye"></i></a>
									<a data-toggle="modal" data-target=".bd-example-modal-lgMP" data-ce2='{{ json_encode($ce2) }}' class="btn btn-info btnModifPer" style="color: white;cursor: pointer;" title="modifier"><i class="icon-pencil"></i></a>
									<a href="{{url('deletece2/'. $ce2 -> ce2ID)}}" class="btn btn-danger" onclick="return confirm('voulez vous vraiment supprimer?')" title="supprimer"><i class="icon-trash"></i></a>
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

	<!--Modal pour ajouter un nouvelle  ce2 -->
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
					<form action="{{url('insertce2')}}" method="post" enctype="multipart/form-data">
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

	<!-- Modal pour modifier une ce2-->.
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
                <form action="{{url('updatece2')}}" method="post" enctype="multipart/form-data">
						@csrf
						<div class=" row gutters">
							<div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-12">
								<div class="form-group">
									<label for="inputName">Nom</label>
									<input type="text" class="form-control" id="inputName" name="nom" required>
									<input type="hidden" class="form-control" id="inputName" name="ce2ID" required>
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
				let ce2Data = JSON.parse(this.getAttribute('data-ce2'));

				console.log(ce2Data); // Debugging pour voir les données
				console.log(ce2Data.ce2ID); // Debugging pour voir l'ID

				// Vérification si l'input est accessible
				let idInput = document.querySelector('.bd-example-modal-lgMP input[name="ce2ID"]');
				if (idInput) {
					idInput.value = ce2Data.ce2ID; // ID
				} else {
					console.error("L'input ID n'a pas été trouvé.");
				}

				let ce2permisInput = document.querySelector('.bd-example-modal-lgMP input[name="nom"]');
				if (ce2permisInput) {
					ce2permisInput.value = ce2Data.nom; // ID
				} else {
					console.error("L'input permis n'a pas été trouvé.");
				}
				let ce2sexeInput = document.querySelector('.bd-example-modal-lgMP select[name="sexe"]');
				if (ce2sexeInput) {
					ce2sexeInput.value = ce2Data.sexe; // ID
				} else {
					console.error("L'input ce2dateexpermis n'a pas été trouvé.");
				}
				let ce2ageInput = document.querySelector('.bd-example-modal-lgMP input[name="age"]');
				if (ce2ageInput) {
					ce2ageInput.value = ce2Data.age; // ID
				} else {
					console.error("L'input ce2typepermis n'a pas été trouvé.");
				}
				let ce2statutInput = document.querySelector('.bd-example-modal-lgMP select[name="statut"]');
				if (ce2statutInput) {
					ce2statutInput.value = ce2Data.statut; // ID
				} else {
					console.error("L'input ce2dateembau n'a pas été trouvé.");
				}

				let ce2prenominput = document.querySelector('.bd-example-modal-lgMP input[name="prenom"]');
				if (ce2prenominput) {
					ce2prenominput.value = ce2Data.prenom; // ID
				} else {
					console.error("L'input ce2images n'a pas été trouvé.");
				}
				let ce2orphelininput = document.querySelector('.bd-example-modal-lgMP select[name="orphelin"]');
				if (ce2orphelininput) {
					ce2orphelininput.value = ce2Data.orphelin; // ID
				} else {
					console.error("L'input statut n'a pas été trouvé.");
				}
				let ce2matriculeinput = document.querySelector('.bd-example-modal-lgMP input[name="matricule"]');
				if (ce2matriculeinput) {
					ce2matriculeinput.value = ce2Data.matricule; // ID
				} else {
					console.error("L'input statut n'a pas été trouvé.");
				}
				let ce2datenaissanceinput = document.querySelector('.bd-example-modal-lgMP input[name="datenaissance"]');
				if (ce2datenaissanceinput) {
					ce2datenaissanceinput.value = ce2Data.datenaissance; // ID
				} else {
					console.error("L'input statut n'a pas été trouvé.");
				}
				let ce2lieunaissanceinput = document.querySelector('.bd-example-modal-lgMP input[name="lieunaissance"]');
				if (ce2lieunaissanceinput) {
					ce2lieunaissanceinput.value = ce2Data.lieunaissance; // ID
				} else {
					console.error("L'input statut n'a pas été trouvé.");
				}
				let ce2numeroparentinput = document.querySelector('.bd-example-modal-lgMP input[name="numeroparent"]');
				if (ce2numeroparentinput) {
					ce2numeroparentinput.value = ce2Data.numeroparent; // ID
				} else {
					console.error("L'input statut n'a pas été trouvé.");
				}
				let ce2adresseinput = document.querySelector('.bd-example-modal-lgMP input[name="adresse"]');
				if (ce2adresseinput) {
					ce2adresseinput.value = ce2Data.adresse; // ID
				} else {
					console.error("L'input statut n'a pas été trouvé.");
				}
				let ce2etatinput = document.querySelector('.bd-example-modal-lgMP select[name="etat"]');
				if (ce2etatinput) {
					ce2etatinput.value = ce2Data.etat; // ID
				} else {
					console.error("L'input statut n'a pas été trouvé.");
				}
			});
		});
	</script>

    <!-- Modal pour visualiser un ce2cule-->
	<div class="modal fade" id="infosleModal" tabindex="-1" role="dialog" aria-labelledby="ce2culeModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="ce2culeModalLabel">Informations sur l'eleve</h5>
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
					var ce2 = JSON.parse(this.getAttribute('data-ce2'));

					// Assurez-vous que les noms correspondent
					document.getElementById('Name').textContent = ce2.nom;
					document.getElementById('sexe').textContent = ce2.sexe;
					document.getElementById('age').textContent = ce2.age;
					document.getElementById('statut').textContent = ce2.statut;
					document.getElementById('prenom').textContent = ce2.prenom;
					document.getElementById('orphelin').textContent = ce2.orphelin;
					document.getElementById('matricule').textContent = ce2.matricule;
					document.getElementById('datenaissance').textContent = ce2.datenaissance;
					document.getElementById('lieunaissance').textContent = ce2.lieunaissance;
					document.getElementById('numeroparent').textContent = ce2.numeroparent;
					document.getElementById('adresse').textContent = ce2.adresse;
					document.getElementById('created_at').textContent = ce2.created_at;
					document.getElementById('etat').textContent = ce2.etat;

					var modal = new bootstrap.Modal(document.getElementById('infosleModal'));
					modal.show();
				});
			});
		});
	</script>

	@endsection