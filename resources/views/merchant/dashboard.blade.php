@extends('layouts.app')

@section('content')
<style>
    /* Container and layout */
    .container {
        padding: 24px;
        background-color: #f3f4f6; /* gray-100 */
        min-height: 100vh;
        font-family: Arial, sans-serif;
        color: #374151; /* gray-700 */
    }

    /* Header */
    .header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 24px;
    }

    .title {
        font-size: 1.5rem; /* 24px */
        font-weight: 700;
        color: #1f2937; /* gray-800 */
        margin: 0;
    }

    .search-input {
        border: 1px solid #d1d5db; /* gray-300 */
        border-radius: 0.5rem; /* 8px */
        padding: 8px 16px;
        outline: none;
        transition: box-shadow 0.3s ease;
    }

    .search-input:focus {
        box-shadow: 0 0 0 2px #60a5fa; /* blue-400 ring */
        border-color: #3b82f6; /* blue-500 */
    }

    /* Table wrapper */
    .table-wrapper {
        overflow-x: auto;
        background: white;
        box-shadow: 0 10px 15px -3px rgba(0,0,0,0.1), 0 4px 6px -2px rgba(0,0,0,0.05);
        border-radius: 0.5rem; /* 8px */
    }

    /* Table */
    .custom-table {
        width: 100%;
        border-collapse: collapse;
        table-layout: auto;
        min-width: 800px; /* allow horizontal scroll if needed */
    }

    .custom-table thead tr {
        background-color: #e5e7eb; /* gray-200 */
        color: #4b5563; /* gray-700 */
        text-transform: uppercase;
        font-size: 0.875rem; /* 14px */
    }

    .custom-table th, .custom-table td {
        padding: 12px 16px;
        text-align: left;
        border-bottom: 1px solid #e5e7eb; /* light gray border */
        vertical-align: middle;
    }

    .custom-table tbody tr:hover {
        background-color: #f9fafb; /* gray-50 */
    }

    .font-medium {
        font-weight: 500;
    }

    /* Status badge */
    .badge {
        padding: 4px 12px;
        border-radius: 9999px;
        color: white;
        font-size: 0.75rem; /* 12px */
        font-weight: 600;
        display: inline-block;
        white-space: nowrap;
    }

    .badge.active {
        background-color: #22c55e; /* green */
    }

    .badge.inactive {
        background-color: #ef4444; /* red */
    }

    /* Buttons */
    .btn {
        padding: 6px 12px;
        border-radius: 0.375rem; /* 6px */
        color: white;
        font-weight: 500;
        border: none;
        cursor: pointer;
        margin-right: 4px;
        font-size: 0.875rem; /* 14px */
        transition: background-color 0.3s ease;
    }

    .btn:last-child {
        margin-right: 0;
    }

    .btn.blue {
        background-color: #3b82f6; /* blue */
    }

    .btn.blue:hover {
        background-color: #2563eb; /* dark blue */
    }

    .btn.green {
        background-color: #22c55e; /* green */
    }

    .btn.green:hover {
        background-color: #16a34a; /* dark green */
    }

    .btn.yellow {
        background-color: #eab308; /* yellow */
    }

    .btn.yellow:hover {
        background-color: #ca8a04; /* dark yellow */
    }

    .btn.purple {
        background-color: #8b5cf6; /* purple */
    }

    .btn.purple:hover {
        background-color: #7c3aed; /* dark purple */
    }
</style>

<div class="container">
    <div class="header">
        <h1 class="title">Merchant Dashboard</h1>
        <input type="text" placeholder="Search..." class="search-input">
    </div>

    <div class="table-wrapper">
        <table class="custom-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Address</th>
                    <th>PW Protected</th>
                    <th>Active Square</th>
                    <th>Apple Pay</th>
                    <th>Apple Login</th>
                    <th>Google Login (iOS)</th>
                    <th>Google Login (Android)</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>22315</td>
                    <td class="font-medium">Oak Bakeshop</td>
                    <td><span class="badge active">Active</span></td>
                    <td>130 Cypress Street, Providence, RI 02906</td>
                    <td>Yes</td>
                    <td>—</td>
                    <td>Yes</td>
                    <td>Yes</td>
                    <td>Yes</td>
                    <td>No</td>
                    <td>
                        <button class="btn blue">Locations</button>
                        <button class="btn green">Orders</button>
                        <button class="btn yellow">Accounting</button>
                        <button class="btn purple">Settings</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
