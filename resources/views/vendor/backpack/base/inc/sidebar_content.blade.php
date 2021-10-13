<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

<li class="nav-title">Tables</li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('user') }}'><i class='nav-icon la la-users'></i> Users</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('mail') }}'><i class='nav-icon la la-envelope'></i> Mails</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('template') }}'><i class='nav-icon la la-columns'></i> Templates</a></li>

<li class="nav-title">Tools</li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('role') }}'><i class='nav-icon la la-briefcase'></i> Roles</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('social') }}'><i class='nav-icon la la-link'></i> Socials</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('template-element') }}'><i class="nav-icon la la-puzzle-piece"></i> Template Elements</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('settings') }}'><i class='nav-icon la la-key'></i> Settings</a></li>