<table border="1" cellpadding="5" cellspacing="0">
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
    @foreach($merchants as $merchant)
        <tr>
            <td>{{ $merchant->id }}</td>
            <td>{{ $merchant->name }}</td>
            <td>{{ $merchant->status }}</td>
            <td>{{ $merchant->address }}</td>
            <td>{{ $merchant->pw_protected ? 'Yes' : 'No' }}</td>
            <td>{{ $merchant->active_square ? 'Yes' : 'No' }}</td>
            <td>{{ $merchant->apple_pay ? 'Yes' : 'No' }}</td>
            <td>{{ $merchant->apple_login ? 'Yes' : 'No' }}</td>
            <td>{{ $merchant->google_login_ios ? 'Yes' : 'No' }}</td>
            <td>{{ $merchant->google_login_android ? 'Yes' : 'No' }}</td>
            <td>
                <button>Locations</button>
                <button>Orders</button>
                <button>Accounting</button>
                <button>Statements</button>
                <button>Logs</button>
                <button>App Configuration</button>
                <button>Parent Settings</button>
                <button>Deal Terms</button>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
