@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-6 m-auto">

            <div class="card">
                <div class="card-header">
                    Enviar Notificacion
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form action="{{ route('notification') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="category" class="form-label">Categoria</label>
                            <select class="form-select form-select mb-3" id="category", name="category">
                                <option selected>Categoria</option>
                                @foreach ($categories as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                            @error('category')
                                <small class="text-danger">{{ $message  }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="message" class="form-label">Mensaje</label>
                            <textarea class="form-control" id="message" name="message" rows="3">{{ old('message') }}</textarea>

                            @error('message')
                                <small class="text-danger">{{ $message  }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <button class="btn btn-success">Enviar Mensaje</button>
                        </div>

                    </form>
                </div>
            </div>
            
            
        </div>
    </div>
@endsection
