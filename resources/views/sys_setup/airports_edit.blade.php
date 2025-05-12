@extends('include.app')
@section('main')
@section('title')
    تعديل مطار
@endsection
<section class="content">

    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">تعديل مطار</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                        class="fas fa-minus"></i></button>
            </div>
        </div>

        @if (isset($airport))
            <div class="card-body">
                <form role="form" action="{{ route('airports.update') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $airport->id }}">
                    <div class="row">
                        <div class="col-3">
                            <!-- text input -->
                            <div class="form-group">
                                <label for="">كود المطار</label>
                                <input type="text" id="code" name="code" value="{{ $airport->code }}"
                                    class="form-control" placeholder=" ادخل كود مكون من 3 احرف " maxlength="3"
                                    style="text-transform: uppercase;">
                            </div>
                        </div>
                        <div class="col-4">
                            <!-- text input -->
                            <div class="form-group">
                                <label>الدولة</label>
                                <input type="text" id="country" name="country" value="{{ $airport->country }}"
                                    class="form-control" placeholder="  الدولة">
                            </div>
                        </div>
                        <div class="col-5">
                            <!-- text input -->
                            <div class="form-group">
                                <label>المدينة</label>
                                <input type="text" id="city" name="city" value="{{ $airport->city }}"
                                    class="form-control" placeholder=" المدينة الذي يقع فيها المطار">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>اسم المطار عربي</label>
                                <input type="text" id="name_ar" name="name_ar" value="{{ $airport->name_ar }}"
                                    class="form-control" placeholder="ادخل اسم المطار بالعربي">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>اسم المطار انجليزي</label>
                                <input type="text" id="name_en" name="name_en" value="{{ $airport->name_en }}"
                                    class="form-control" placeholder=" ادخل اسم المطار بالانجليزي">
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
