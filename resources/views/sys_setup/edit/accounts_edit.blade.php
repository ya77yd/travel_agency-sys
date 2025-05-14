@extends('include.app')
@section('main')
@section('title')
    تعديل حساب
@endsection
<section class="content">
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">تعديل حساب</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                        class="fas fa-minus"></i></button>
            </div>
        </div>
        <div class="card-body">
            <form role="form" action="{{ route('accounts.update') }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $account->id }}" required>
                <div class="row">
                    <div class="col-4">
                        <!-- text input -->
                        <div class="form-group">
                            <label for="">الاسم</label>
                            <input type="text" id="name" name="name" value="{{ $account->name }}"
                                class="form-control" placeholder="ادخل اسم الاحساب" required>
                        </div>
                    </div>
                    <div class="col-4">
                        <!-- text input -->
                        @if (isset($accounts))
                            <div class="form-group">
                                <label>الحساب الاب</label>
                                <select class="form-control select2" style="width: 100%;" id="parent_id" name="parent_id" required>
                                    @foreach ($accounts as $a)
                                        @if ($a->id == $account->parent_id)
                                            <option value="{{ $a->id }}" selected>{{ $a->name }}</option>
                                        @elseif($a->is_main == 1)
                                            <option value="{{ $a->id }}">{{ $a->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        @endif
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label>حساب رئيسي؟</label>
                            <select class="form-control" id="is_main" name="is_main"required>
                                @if ($account->is_main == 1)
                                    <option value="1">نعم</option>
                                    <option value="0">لا</option>
                                @else
                                    <option value="0">لا</option>
                                    <option value="1">نعم</option>
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label>حالة الحساب</label>
                            <select class="form-control" id="status" name="status" required>
                                @if ($account->status == 1)
                                    <option value="1">مفعل</option>
                                    <option value="0">غير مفعل</option>
                                @else
                                    <option value="0">غير مفعل</option>
                                    <option value="1">مفعل</option>
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">تأكيد</button>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
        </div>
        </form>
    </div>
</section>
@endsection

