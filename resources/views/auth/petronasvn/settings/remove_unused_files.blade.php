@extends('layouts.petronasvn.app')

@section('content')
<section class="content">
   <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header">
                <form method="post" action="?">
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-danger" {{ !count($data) ? 'disabled' : '' }}>Xóa</button>
                </form>
                
            </div>
            
            <div class="box-body">
                <div class="table-responsive" style="max-height:500px; overflow-x: hidden; overflow-y:auto">
                    <table class="table table-hover" style="word-wrap:break-word;">
                        <thead>
                            <tr>
                                <th>Filename</th>
                                <th>Full path</th>
                                <th>Size</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $item)
                            <tr>
                                <td>{{ $item['filename'] }}</td>
                                <td>{{ $item['filepath'] }}</td>
                                <td>{{ $item['filesize'] }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
      </div>
   </div>
</section>

@endsection