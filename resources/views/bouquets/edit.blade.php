@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            bouquet
        </h1>
    </section>
    <div class="content">
       @include('basic-template::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($bouquet, ['route' => ['bouquets.update', $bouquet->id], 'method' => 'patch']) !!}

                        @include('bouquets.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
    </div>
@endsection