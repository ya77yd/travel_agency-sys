@extends('include.app')
@section('main')
@section('title')
تهيئة شركات الطيران
@endsection
<section class="content">

<div class="card card-default">
    <div class="card-header">
      <h3 class="card-title">Select2</h3>

      <div class="card-tools">
         <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <div class="row">
            <div class="col-3">
                <!-- text input -->
                <div class="form-group">
                <label>Text</label>
                <input type="text" class="form-control" placeholder="Enter ...">
                </div>
            </div>
            <div class="col-4">
                <!-- text input -->
                <div class="form-group">
                <label>Text</label>
                <input type="text" class="form-control" placeholder="Enter ...">
                </div>
            </div>
            <div class="col-5">
                <!-- text input -->
                <div class="form-group">
                <label>Text</label>
                <input type="text" class="form-control" placeholder="Enter ...">
                </div>
            </div>
        
            <div class="col-md-6">
                <!-- text input -->
                <div class="form-group">
                <label>Text</label>
                <input type="text" class="form-control" placeholder="Enter ...">
                </div>
            </div>
            <div class="col-md-6">
                <!-- text input -->
                <div class="form-group">
                <label>Text</label>
                <input type="text" class="form-control" placeholder="Enter ...">
                </div>
                
            </div>
            <div class="col-2">
              <div class="form-group">
              
                <button type="submit" class="btn btn-success swalDefaultSuccess">Submit</button>
                <button type="button" class="btn btn-success swalDefaultError">
                  Launch Success Toast
                </button>
            </div>
          </div>

        </div>
      <!-- /.row -->
    </div>
    <!-- /.card-body -->
    
  </div>
</section>




@endsection
