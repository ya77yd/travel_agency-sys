@extends('include.app')
@section('main')
@section('title')
    تهيئة شركات الطيران
@endsection
<section class="content">

    <div class="card card-default">
        <div class="card-header">
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                        class="fas fa-minus"></i></button>
            </div>
            <h3 class="card-title">اضافة شركة طيران</h3>
        </div>


        <div class="card-body">
            <form role="form" action="{{ route('airlines.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-3">
                        <!-- text input -->
                        <div class="form-group">
                            <label for="">كود الشركة</label>
                            <input type="text" id="code" name="code" class="form-control"
                                placeholder=" ادخل كود مثل:IY  " maxlength="3"
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
                    

                    <div class="col-md-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>اسم الشركة عربي</label>
                            <input type="text" id="name_ar" name="name_ar" class="form-control"
                                placeholder="ادخل اسم الشركة بالعربي">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>اسم الشركة انجليزي</label>
                            <input type="text" id="name_en" name="name_en" class="form-control"
                                placeholder=" ادخل اسم الشركة بالانجليزي">
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
                <h3 class="card-title" style="text-align: center; font-weight: bold; font-size: 1.5rem; color: #333;">
                    عرض شركات الطيران
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>الرقم</th>
                        <th>كود الطيران</th>
                        <th>الدولة</th>
                        <th>الاسم عربي  بالعربي</th>
                        <th>  الاسم انجليزي</th>
                     <th>المستخدم  </th>
                     <th> تعديل  </th>

                        <th>العمليات</th>
                    </tr>
                </thead>
                @php
                    $count = 1;
                @endphp
                <tbody>
                    @if (isset($airlines))
                        @foreach ($airlines as $airline)
                            <tr>
                                <td>{{ $count++ }}</td>
                                <td>{{ $airline->code }}</td>
                                <td>{{ $airline->country }}</td>
                                <td>{{ $airline->name_ar }}</td>
                                <td>{{ $airline->name_en }}</td>
                                <td>
                             @if (isset($users))
                               @foreach ($users as $user)
                                   @if ($user->id == $airline->created_by)
                                       {{ $user->name }}
                                  
                                   @endif
                              @endforeach
                    
                          @endif
                                <td>
                                    @if (isset($users))
                                        @foreach ($users as $user)
                                            @if ($user->id == $airline->updated_by)
                                                {{ $user->name }}
                                            
                                            @else 
                                            -
                                            @endif
                                        @endforeach
                                        
                                    @endif
                                </td>
                                <td>
                                  <a class="btn btn-info btn-sm" href="{{ route('airlines.edit', $airline->id) }}">
                              <i class="fas fa-pencil-alt">
                              </i>
                              تعديل
                          </a>
                          <a class="btn btn-danger btn-sm" href="{{ route('airlines.destroy', $airline->id) }}">
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
