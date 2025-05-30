@extends('include.app')
@section('main')
@section('title')
    تعديل شركة طيران
@endsection
<section class="content">

    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">تعديل شركة طيران</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                        class="fas fa-minus"></i></button>
            </div>
        </div>

        @if (isset($airline))
            <div class="card-body">
                <form role="form" action="{{ route('airlines.update') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $airline->id }}" required>
                    <div class="row">
                        <div class="col-3">
                            <!-- text input -->
                            <div class="form-group">
                                <label for="">كود الشركة</label>
                                <input type="text" id="code" name="code" value="{{ $airline->code }}"
                                    class="form-control" placeholder=" " maxlength="3" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <!-- text input -->
                            <div class="form-group">
                                <label>الدولة</label>
                                <input type="text" id="country" name="country" value="{{ $airline->country }}"
                                    class="form-control" placeholder="  الدولة"required>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>اسم الشركة عربي</label>
                                <input type="text" id="name_ar" name="name_ar" value="{{ $airline->name_ar }}"
                                    class="form-control" placeholder="ادخل اسم الشركة بالعربي"required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>اسم الشركة انجليزي</label>
                                <input type="text" id="name_en" name="name_en" value="{{ $airline->name_en }}"
                                    class="form-control" placeholder=" ادخل اسم المطار بالانجليزي"required>
                            </div>

                        </div>
                        <div class="col-2">
                            <div class="form-group">

                                <button type="submit" class="btn btn-primary">تأكيد</button>
                            </div>
                        </div>

                    </div>
                    <!-- /.row -->
            </div>
            </form>

    </div>
    @endif
</section>
@endsection
