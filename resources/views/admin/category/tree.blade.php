@extends('admin.layouts.app')

@section('content')
    @include('admin.parts.content-header', [
        'page_title' => 'Категорії',

    ])

    <!-- Main content -->
    <section class="content">

        <!-- FILTER -->
        @include('admin.category.inc.filter')

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"></h3>

                <div class="card-tools">

                </div>
            </div>
            <div class="card-body">





            </div>

        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
@endsection
