		@extends('layout.base')
		@section('content')
		
		<div class="page-header">
			<ol class="breadcrumb">
				<li class="breadcrumb-item">Tableau de bord <a href="{{url('home')}}"><i class="icon-home"></i></li></a></li>
				<li class="breadcrumb-item active">Departement/servicess</li>
			</ol>
		</div>
		<div class="container-flex">
			<ul class="nav nav-tabs nav-justified " role="tablist">
				<li class="nav-item">
					<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true" style="font-size: 30px;"><i class="icon-format_align_center"></i> Departement</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="setting-tab" data-toggle="tab" href="#setting" role="tab" aria-controls="setting" aria-selected="false" style="font-size: 30px;"><i class="icon-filter_list"></i> servicess</a>
				</li>
			</ul>

			<div class="tab-content">
				<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
					<div class="main-container">
						<div class="row gutters">
							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
								<div class="card">
									<div class="card-header">
										<div class="card-title">Liste des Departement</div>
									</div>
									<div class="col-md-12">
										<span class="float-right">
											<button type="button" class="btn btn-dark" data-toggle="modal" data-target=".bd-example-modal-lgAD" title="imprimer"><i class="icon-print"></i> Imprimer</button>
											<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lgAD" title="ajouter un departement"><i class="icon-plus"></i> Ajouter</button>
										</span>
									</div>
									<div class="card-body">
										<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
											<div class="table-container">
												<div class="table-responsive">
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
													<table class="table custom-table m-0">
														<thead>
															<tr>
																<th>#</th>
																<th>Libelle en francais Departemennt</th>
																<th>Libelle en anglais Departemennt</th>
																<th>Date de creation</th>
																<th>Actions</th>
															</tr>
														</thead>
														<tbody>
															@php
															$count = 1;
															@endphp
															@if($departement->isEmpty())
															<tr>
																<td colspan="10" class="tabcenter">Aucun Departement trouver.</td>
															</tr>
															@else
															@foreach ($departement as $departement)
															<tr>
																<td>{{ $count }}</td>
																<td>{{$departement -> libelleFr}}</td>
																<td>{{$departement -> libelleEn}}</td>
																<td>{{$departement -> created_at}}</td>
																<td>
																	<a data-toggle="modal" data-target=".bd-example-modal-lgMD" data-departement='{{ json_encode($departement) }}' class="btn btn-info btnModifD" style="color: white;cursor: pointer;" title="modifier"><i class="icon-pencil"></i></a>
																	<a href="{{url('deleteDepartement/'. $departement -> departementID)}}" class="btn btn-danger" onclick="return confirm('voulez vous vraiment supprimer?')" title="supprimer"><i class="icon-cancel"></i></a>
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
								</div>
							</div>
						</div>
					</div>
				</div>

				<!--servicess-->
				<div class="tab-pane fade" id="setting" role="tabpanel" aria-labelledby="setting-tab">
					<div class="main-container">
						<div class="row gutters">
							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
								<div class="card">
									<div class="card-header">
										<div class="card-title">Liste des servicess</div>
									</div>
									<div class="col-md-12">
										<span class="float-right">
											<button type="button" class="btn btn-dark" data-toggle="modal" data-target=".bd-example-modal-lgAS" title="imprimer"><i class="icon-print"></i> Imprimer</button>
											<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lgAS" title="ajouter un services"><i class="icon-plus"></i> Ajouter</button>
										</span>
									</div>
									<div class="card-body">
										<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
											<div class="table-container">
												<div class="table-responsive">
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
													<table class="table custom-table m-0">
														<thead>
															<tr>
																<th>#</th>
																<th>Libelle en francais servicess</th>
																<th>Libelle en anglais servicess</th>
																<th>Date de creation</th>
																<th>Actions</th>
															</tr>
														</thead>
														<tbody>
															@php
															$count = 1;
															@endphp
															@if($services->isEmpty())
															<tr>
																<td colspan="10" class="tabcenter">Aucun services trouver.</td>
															</tr>
															@else
															@foreach ($services as $services)
															<tr>
																<td>{{ $count }}</td>
																<td>{{$services -> libelleFr}}</td>
																<td>{{$services -> libelleEn}}</td>
																<td>{{$services -> created_at}}</td>
																<td>
																	<a data-toggle="modal" data-target=".bd-example-modal-lgMS" data-services='{{ json_encode($services) }}' class="btn btn-info btnModifMS" style="color: white;cursor: pointer;" title="modifier"><i class="icon-pencil"></i></a>
																	<a href="{{url('deleteservicess/'. $services -> servicessID)}}" class="btn btn-danger" onclick="return confirm('voulez vous vraiment supprimer?')"><i class="icon-cancel" title="supprimer"></i></a>
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
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>

		<!--Modal pour ajouter un nouveau departement -->
		<div class="modal fade bd-example-modal-lgAD" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="myLargeModalLabel">Ajout d'un departement</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form action="{{url('insertDepartement')}}" method="post" enctype="multipart/form-data">
							@csrf
							<div class=" row gutters">
								<div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-12">
									<div class="form-group">
										<label for="inputName">Libellé (Français)</label>
										<input type="text" class="form-control" id="inputName" name="libelleFr" required style="width: 550px;">
									</div>
								</div>
								<div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-12" style="width: 550px;margin-left:200px">
									<div class="form-group">
										<label for="inputName">Libellé (Anglais)</label>
										<input type="text" class="form-control" id="inputName" name="libelleEn" required style="width: 550px;">
									</div>
								</div>
							</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="return confirm('Voulez-vous vraiment annuler ?')">Close</button>
						<button type="submit" class="btn btn-primary">Save</button>
					</div>
				</div>
				</form>
			</div>
		</div>

		<!--Modal pour modifier un nouveau departement -->
		<div class="modal fade bd-example-modal-lgMD" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="myLargeModalLabel">Modification d'un Departement</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form action="{{url('updateDepartement')}}" method="post" enctype="multipart/form-data">
							@csrf
							<div class=" row gutters">
								<div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-12">
									<div class="form-group">
										<label for="inputName">Libellé (Français)</label>
										<input type="text" class="form-control" id="inputName" name="libelleFr" required style="width: 550px;">
									</div>
								</div>
								<div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-12" style="width: 550px;margin-left:200px">
									<div class="form-group">
										<label for="inputName">Libellé (Anglais)</label>
										<input type="text" class="form-control" id="inputName" name="libelleEn" required style="width: 550px;">
										<input type="hidden" class="form-control" name="departementID">
									</div>
								</div>
							</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="return confirm('Voulez-vous vraiment annuler ?')">Close</button>
						<button type="submit" class="btn btn-primary">Modifier</button>
					</div>
				</div>
				</form>
			</div>
		</div>
		<script>
			// Écouteur d'événement pour le clic sur le bouton "Modifier"
			document.querySelectorAll('.btnModifD').forEach(button => {
				button.addEventListener('click', function() {
					let departementData = JSON.parse(this.getAttribute('data-departement'));

					console.log(departementData); // Debugging pour voir les données
					console.log(departementData.departementID); // Debugging pour voir l'ID


					// Remplir les autres champs
					document.querySelector('.bd-example-modal-lgMD input[name="libelleFr"]').value = departementData.libelleFr;
					document.querySelector('.bd-example-modal-lgMD input[name="libelleEn"]').value = departementData.libelleEn;
					document.querySelector('.bd-example-modal-lgMD input[name="departementID"]').value = departementData.departementID;
				});
			});
		</script>

		<!--Modal pour ajouter un nouveau servicess -->
		<div class="modal fade bd-example-modal-lgAS" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="myLargeModalLabel">Ajout d'un servicess</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form action="{{url('insertservicess')}}" method="post" enctype="multipart/form-data">
							@csrf
							<div class=" row gutters">
								<div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-12">
									<div class="form-group">
										<label for="inputName">Libellé (Français)</label>
										<input type="text" class="form-control" id="inputName" name="libelleFr" required style="width: 550px;">
									</div>
								</div>
								<div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-12" style="width: 550px;margin-left:200px">
									<div class="form-group">
										<label for="inputName">Libellé (Anglais)</label>
										<input type="text" class="form-control" id="inputName" name="libelleEn" required style="width: 550px;">
									</div>
								</div>
								<div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-12">
									<select type="text" class="form-control" name="departementID" required>
										<option>choisir le departement</option>
										@php
										$departement = DB::table('departements')->get();
										@endphp
										@foreach ($departement as $departement)
										<option value="{{$departement -> departementID}}">{{$departement ->libelleFr}}</option>
										@endforeach
									</select>
								</div>
							</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="return confirm('Voulez-vous vraiment annuler ?')">Close</button>
						<button type="submit" class="btn btn-primary">Save</button>
					</div>
				</div>
				</form>
			</div>
		</div>
		<script>
			$("#tile-1 .nav-tabs a").click(function() {
				var position = $(this).parent().position();
				var width = $(this).parent().width();
				$("#tile-1 .slider").css({
					"left": +position.left,
					"width": width
				});
			});
			var actWidth = $("#tile-1 .nav-tabs").find(".active").parent("li").width();
			var actPosition = $("#tile-1 .nav-tabs .active").position();
			$("#tile-1 .slider").css({
				"left": +actPosition.left,
				"width": actWidth
			});
		</script>

		<!--Modal pour modifier un services-->
		<div class="modal fade bd-example-modal-lgMS" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="myLargeModalLabel">Modification d'un servicess</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form action="{{url('updateservicess')}}" method="post" enctype="multipart/form-data">
							@csrf
							<div class=" row gutters">
								<div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-12">
									<div class="form-group">
										<label for="inputName">Libellé (Français)</label>
										<input type="text" class="form-control" id="inputName" name="libelleFr" required style="width: 550px;">
									</div>
								</div>
								<div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-12" style="width: 550px;margin-left:200px">
									<div class="form-group">
										<label for="inputName">Libellé (Anglais)</label>
										<input type="text" class="form-control" id="inputName" name="libelleEn" required style="width: 550px;">
										<input type="hidden" class="form-control" name="servicessID">
									</div>
								</div>
							</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="return confirm('Voulez-vous vraiment annuler ?')">Close</button>
						<button type="submit" class="btn btn-primary">Modifier</button>
					</div>
				</div>
				</form>
			</div>
		</div>
		<script>
			// Écouteur d'événement pour le clic sur le bouton "Modifier"
			document.querySelectorAll('.btnModifMS').forEach(button => {
				button.addEventListener('click', function() {
					let servicessData = JSON.parse(this.getAttribute('data-services'));

					console.log(servicessData); // Debugging pour voir les données
					console.log(servicessData.servicessID); // Debugging pour voir l'ID


					// Remplir les autres champs
					document.querySelector('.bd-example-modal-lgMS input[name="libelleFr"]').value = servicessData.libelleFr;
					document.querySelector('.bd-example-modal-lgMS input[name="libelleEn"]').value = servicessData.libelleEn;
					document.querySelector('.bd-example-modal-lgMS input[name="servicessID"]').value = servicessData.servicessID;
				});
			});
		</script>

		@endsection