        <div class="sidebar bg-white p-20 p-relative">
            <h3 class="p-relative text-c mt-0"> @yield('admin_name') </h3>
            <ul>
                <li>
                    <a class="active rad-6" href="{{ route('dashboard')}}" title="Dashboard">
                        <i class="fa-solid fa-house"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a class="rad-6" href="{{ route('products')}}" title="Products">
                        <i class="fa-solid fa-gear"></i>
                        <span>products</span>
                    </a>
                </li>
                <li>
                    <a class=" rad-6" href="{{ route('create_product')}}" title="add product">
                        <i class="fa-regular fa-user"></i>
                        <span>add product</span>
                    </a>
                </li>
                <li>
                    <a class="rad-6" href="{{ route('all_users')}}" title="all users">
                <i class="fa-regular fa-people-group"></i>
                        <span>all users</span>
                    </a>
                </li>
            </ul>
        </div>