@extends('include.app')
@section('main')
@section('title')
    تهيئة العملاء
@endsection
<section class="content">
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">اضافة عميل</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                        class="fas fa-minus"></i></button>
            </div>
        </div>
        <div class="card-body">
            <form role="form" action="{{ route('customers.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-3">
                        <!-- text input -->
                        <div class="form-group">
                            <label for=""> اسم العميل</label>
                            <input type="text" id="name" name="name" class="form-control"
                                placeholder="" >
                        </div>
                    </div>
                    <div class="col-4">
                        <!-- text input -->
                        <div class="form-group">
                            <label>حساب العميل</label>
                           <select class="form-control select2" style="width: 100%;" id="account_id" name="account_id">
                    <option value="">اختر الحساب</option>
                           @if(isset($accounts))
                        @foreach($accounts as $account)
                         <option value="{{ $account->id }}">{{ $account->name }}</option>
                          
                        @endforeach
                        @endif
                    
                  </select>
                        </div>
                    </div>
                    <div class="col-5">
                        <!-- text input -->
                        <div class="form-group">
                            <label>العنوان</label>
                            <input type="text" id="address" name="address" class="form-control"
                                placeholder="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>رقم الهوية</label>
                            <input type="text" id="id_card" name="id_card" class="form-control"
                                placeholder="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>  رقم الهاتف</label>
                            <input type="phone" id="phone" name="phone" class="form-control"
                                placeholder="    ">
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
            <h3 class="card-title-rtl">جدول بيانات العملاء</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>الرقم</th>
                        <th>اسم العميل</th>
                        <th>الحساب</th>
                        <th>العنوان</th>
                        <th>الهوية  </th>
                        <th> الهاتف </th>
                        <th> المستخدم </th>
                        <th>العمليات</th>
                    </tr>
                </thead>
                @php
                    $count = 1;
                @endphp
                <tbody>
                    @if (isset($customers))
                        @foreach ($customers as $customer)
                            <tr>
                                <td>{{ $count++ }}</td>
                                <td>{{ $customer->name }}</td>
                                <td>
                                
                                @if (isset($accounts))
                                        @foreach ($accounts as $account)
                                            @if ($account->id == $customer->account_id)
                                                {{ $account->name }}
                                            @endif
                                        @endforeach
                                    @endif
                               </td>
                                <td>{{ $customer->address }}</td>
                                <td>{{ $customer->id_card }}</td>
                                <td>{{ $customer->phone}}</td>
                                <td>
                                    @if (isset($users))
                                        @foreach ($users as $user)
                                            @if ($user->id == $customer->created_by)
                                                {{ $user->name }}
                                            @endif
                                        @endforeach
                                    @endif
                                <td>
                                    <a class="btn btn-success btn-sm" href="{{ route('customers.edit', $customer->id) }}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        تعديل
                                    </a>
                                    <a class="btn btn-danger btn-sm"
                                        href="{{ route('customers.destroy', $customer->id) }}">
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

