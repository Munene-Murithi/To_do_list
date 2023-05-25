@extends('layouts.app')

@section('content')
<section class="vh-100">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col">
                <div class="card rounded-3" id="list1" style="background-color: #eff1f2;">
                    <div class="card-body py-4 px-4 px-md-5">

                        <h1 class="text-center mt-3 mb-4 pb-3 text-primary">
                            <i class="fas fa-check-square me-1"></i>
                            <u>My Todo-s</u>
                        </h1>

                        <div class="pb-2">
                            <div class="card">
                                <div class="card-body">
                                    <form action="/store-data" method="POST">
                                        @csrf
                        
                                        <div class="row ">
                                            <div class="col bordered">
                                                <input type="text" class="form-control" id="title" name="name" placeholder="Enter title" required>
                                            </div>
                                            <div class="col bordered">
                                                <textarea class="form-control" id="description" name="description" placeholder="Enter description" required></textarea>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row pt-3 align-items-center">
                                            
                                            <button type="submit" class="btn btn-outline-primary bg-grey mx-auto">Create</button>
                                        </div>
                                        
                                    </form>
                                </div>
                                
                            </div>
                           
                        </div>
                        
                        

                        <hr class="my-4">

                        
                        
                        <div class="card mt-4">
                            <div class="card-body">
                                @foreach($todos as $todo)
                                <ul class="list-group list-group-horizontal rounded-0 bg-transparent">
                                    <li class="list-group-item d-flex align-items-center ps-0 pe-3 py-1 rounded-0 border-0 bg-transparent">
                                        <div class="form-check">
                                            <input class="form-check-input me-0" type="checkbox" value="" id="flexCheckChecked1"
                                                aria-label="..." checked>
                                        </div>
                                    </li>
                                    <li class="list-group-item px-3 py-1 d-flex align-items-center flex-grow-1 border-0 bg-transparent">
                                        <p class="lead fw-normal mb-0">{{ $todo->name }} </p><p class="mx-auto lead "> {{ $todo->description }}</span></p>
                                
                                    </li>
                                    <hr>
                                    <li class="list-group-item ps-3 pe-0 py-1 rounded-0 border-0 bg-transparent">
                                        <div class="d-flex flex-row justify-content-end mb-1">
                                            <a href="{{ route('edit', ['todo' => $todo->id]) }}" class="text-info" data-bs-toggle="tooltip" title="Edit todo">
                                                <i class="fas fa-pencil-alt me-3"></i>
                                            </a>
                                            
                                            
                                                    <a href="{{ route('delete', ['todo' => $todo->id]) }}" class="text-danger" data-bs-toggle="tooltip" title="Delete todo">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </a>
                                                    
                                        </div>
                                        <div class="text-end text-muted">
                                            <a href="#" class="text-muted" data-bs-toggle="tooltip" title="Created date">
                                                <p class="small mb-0"><i class="fas fa-info-circle me-2"></i>{{ $todo->created_at->format('jS M Y') }}</p>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
