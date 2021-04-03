@extends('layouts.admin')

@section('title')
    Kategori Gejala Covid
@endsection

@push('addon-style')
    <link href="{{ url('backend/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush

@section('content')
    <!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kategori Gejala Covid</h1>
        <a href="{{ route('kategori-covid.create') }}" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Kategori Gejala Covid
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            @if ($message = Session::get('success'))
				<div class="alert alert-success alert-block">
					<strong>{{ $message }}</strong>
				</div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered table-hover" width="100%" cellspacing="0" id="dataTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                           <th>Kategori</th>
                           <th>Solusi</th>
                           <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                           <td>{{ $item->kategori }}</td>
                           <td>{!! str_limit($item->solusi, 50) !!}</td>
                           <td>
                            <a href="{{ route('kategori-covid.edit', $item->id) }} "class=" btn btn-warning m-1">
                                <i class="fa fa-pencil-alt"></i>
                            </a>
                            <a href="javascript:;" data-toggle="modal" onclick="deleteData({{$item->id}})" 
                                data-target="#DeleteModal" class="btn btn-danger d-inline-block m-1"><i class="fa fa-trash"></i>
                            </a>
                           </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Delete Model --}}
    <div  class="modal fade" id="DeleteModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
        <!-- Modal content-->
            <form action="" id="deleteForm" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-danger" id="DeleteTitle">Delete</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <p>Apa kamu yakin ingin menghapus data dengan ini?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" name="" class="btn btn-danger" data-dismiss="modal" onclick="formSubmit()"> Delete</button>
                    </div>
                </div>
            </form>
        </div>
   </div>
</div>



@endsection
@push('addon-script')
<script src="{{ url('backend/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('backend/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script>
    // Call the dataTables jQuery plugin
    $(document).ready(function() {
    $('#dataTable').DataTable();
    });
</script>
<script type="text/javascript">
    function deleteData(id)
    {
        var id = id;
        var url = '{{ route("kategori-covid.destroy", ":id") }}';
        url = url.replace(':id', id);
        $("#deleteForm").attr('action', url);
    }

    function formSubmit()
    {
        $("#deleteForm").submit();
    }
 </script>
@endpush