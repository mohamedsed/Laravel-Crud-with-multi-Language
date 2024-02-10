<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Crud with multi Language</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>




<div style="display: block; opacity: 10; margin-top: 5px">
	<div class="modal-dialog">
		<div class="modal-content mt-1">

              @if (Session::has('message'))

            <div class="alert alert-success" role="alert">
               {{  Session::get('message') }}
            </div>
            @endif

			<form method="POST" action="{{ route('update.offer',$offer->id)}}" enctype="multipart/form-data">
                @csrf
				<div class="modal-header">
					<h4 class="modal-title">{{ __('message.Edit Offer') }}</h4>

				</div>
                <div class="modal-body">
					<div class="form-group">
						<label>{{ __('message.Add Photo') }}</label>
						<input type="file" class="form-control" name="image" >
                        @error('image')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
					</div>
				<div class="modal-body">
					<div class="form-group">
						<label>{{ __('message.Name English') }}</label>
						<input type="text" class="form-control" name="name_en" value="{{ $offer->name_en }}" >
                        @error('name_en')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
					</div>
                    	<div class="form-group">
						<label>{{ __('message.Name Arabic') }}</label>
						<input type="text" class="form-control" name="name_ar" value="{{ $offer->name_ar }}" >
                        @error('name_ar')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
					</div>
					<div class="form-group">
						<label>{{ __('message.Description English') }}</label>
						<textarea class="form-control"  name="description_en" >{{ $offer->description_en}}</textarea>
                           @error('description_en')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
					</div>
                    <div class="form-group">
						<label>{{ __('message.Description Arabic') }}</label>
						<textarea class="form-control"  name="description_ar" >{{ $offer->description_ar}}</textarea>
                           @error('description_ar')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
					</div>
					<div class="form-group">
						<label>{{ __('message.Price') }}</label>
						<input type="text" class="form-control" name="price" value="{{ $offer->price }}" >
                          @error('price')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
					</div>
				</div>
				<div class="modal-footer">

					<input type="submit" class="btn btn-info" value="{{ __('message.Save') }}">
				</div>
			</form>
		</div>
	</div>
</div>
</body>
</html>
