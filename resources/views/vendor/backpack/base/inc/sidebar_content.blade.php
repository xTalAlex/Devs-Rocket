<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

<li class="nav-title">Table</li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('user') }}'><i class='nav-icon la la-users'></i> Users</a></li>

<li class="nav-title">Tools</li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('role') }}'><i class='nav-icon la la-briefcase'></i> Roles</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('social') }}'><i class='nav-icon la la-link'></i> Socials</a></li>