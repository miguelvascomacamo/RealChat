@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                   <table class="table table-bordered table-responsive">
                       <caption>Lista de  Utilizadores</caption>
                       <thead>
                         <tr>
                             <th>ID</th>
                             <th>Name</th>
                             <th>Email</th>
                             <th>Data</th>
                             <th>###</th>
                         </tr>
                       </thead>

                       <tbody>
                       @foreach($users as $user)
                       <tr>

                           <td>{!! $user->id !!}</td>
                           <td>{!! $user->name !!}</td>
                           <td>{!! $user->email !!}</td>
                           <td>{!! $user->created_at !!}</td>
                           <td>
                               <a href="" class="btn btn-danger"><i class=" glyphicon-trash"></i> </a>
                               <a href="" class="btn btn-success"><i class=" glyphicon-edit"></i> </a>
                               <a href="" class="btn btn-info"><i class=" glyphicon-eye-open"></i> </a>
                           </td>
                       </tr>
                       @endforeach
                       </tbody>
                   </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
