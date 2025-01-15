@extends('layouts.app')
@section('title', 'Dashboard | Manage Expense')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 col-xxl-12 order-3 order-md-2">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="page-title d-inline-block">
                                    <i class="mdi mdi-account-circle title_icon"></i> Expenses
                                </h4>

                                <a href="{{ route('expenses.create') }}" class="btn btn-outline-primary btn-rounded align-middle mt-1 float-end">
                                    <i class="mdi mdi-plus"></i> Create Expense
                                </a>

                                <table id="example" class="table dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Amount</th>
                                            <th>Date</th>
                                            <th>Operation</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($expenses as $expense)
                                            <tr id="row-{{ $expense->id }}">
                                                <td>{{ $expense->id ?? '' }}</td>
                                                <td>{{ $expense->title ?? '' }}</td>
                                                <td>{{ $expense->description ? Str::limit($expense->description,30) : ' '}}</td>
                                                <td>{{ $expense->total_amount ?? '' }}</td>
                                                <td>{{ $expense->date ?? '' }}</td>
                                                <td>
                                                    <a href="{{ route('expenses.edit', $expense->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                                    <a href="javascript:void(0);" class="btn btn-danger btn-sm" onclick="deleteRec({{ $expense->id }}, 'expenses')">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
