@extends('include.app')
@section('main')
@section('title')
    تهيئة المطارات
@endsection
<section class="content">

    <div class="card card-default">
        <div class="card-header">
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                        class="fas fa-minus"></i></button>
            </div>
            <h3 class="card-title">اضافة مطار</h3>
        </div>


        <div class="card-body">
            <form role="form" action="{{ route('airports.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-3">
                        <!-- text input -->
                        <div class="form-group">
                            <label for="">كود المطار</label>
                            <input type="text" id="code" name="code" class="form-control"
                                placeholder=" ادخل كود مكون من 3 احرف " maxlength="3"
                                style="text-transform: uppercase;">
                        </div>
                    </div>
                    <div class="col-4">
                        <!-- text input -->
                        <div class="form-group">
                            <label>الدولة</label>
                            <input type="text" id="country" name="country" class="form-control"
                                placeholder="  الدولة">
                        </div>
                    </div>
                    <div class="col-5">
                        <!-- text input -->
                        <div class="form-group">
                            <label>المدينة</label>
                            <input type="text" id="city" name="city" class="form-control"
                                placeholder=" المدينة الذي يقع فيها المطار">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>اسم المطار عربي</label>
                            <input type="text" id="name_ar" name="name_ar" class="form-control"
                                placeholder="ادخل اسم المطار بالعربي">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>اسم المطار انجليزي</label>
                            <input type="text" id="name_en" name="name_en" class="form-control"
                                placeholder=" ادخل اسم المطار بالانجليزي">
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
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">جدول بيانات المطارات</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>الرقم</th>
                        <th>كود المطار</th>
                        <th>الدولة</th>
                        <th>المدينة</th>
                        <th>الاسم عربي </th>
                        <th>الاسم انجليزي  </th>
                         <th> المستخدم </th>

                        <th>العمليات</th>
                    </tr>
                </thead>
                @php
                    $count = 1;
                @endphp
                <tbody>
                    @if (isset($airports))
                        @foreach ($airports as $airport)
                            <tr>
                                <td>{{ $count++ }}</td>
                                <td>{{ $airport->code }}</td>
                                <td>{{ $airport->country }}</td>
                                <td>{{ $airport->city }}</td>
                                <td>{{ $airport->name_ar }}</td>
                                <td>{{ $airport->name_en }}</td>
                                <td>
                                    @if (isset($users))
                                        @foreach ($users as $user)
                                            @if ($user->id == $airport->created_by)
                                                {{ $user->name }}
                                            @endif
                                        @endforeach
                                        
                                    @endif
                                <td>
<a class="btn btn-info btn-sm" href="{{ route('airports.edit', $airport->id) }}">
                              <i class="fas fa-pencil-alt">
                              </i>
                              تعديل
                          </a>
                          <a class="btn btn-danger btn-sm" href="{{ route('airports.destroy', $airport->id) }}">
                              <i class="fas fa-trash">
                              </i>
                              حذف
                          </a>


                                  
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6" class="text-center">لا توجد بيانات</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
</section>
@endsection
