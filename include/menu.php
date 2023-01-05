<?php if ($level == "Admin") { ?>
                        <li class="nav-small-cap">Admin Menu</li>
                        <li class="has_sub"> <a href="#" class="waves-effect"><i class="fa fa-dashcube"></i> <span> Admin Panel </span> </a>
                            <ul class="list-unstyled">
                                <li><a href="?admin=api">Edit API</a>
                                </li>
                                <li><a href="?admin=user">Edit User</a>
                                </li>
                                <li><a href="?admin=gemscool-cash">Edit Gemscool Cash</a>
                                </li>
                                <li><a href="?admin=garena-cash">Edit Shell Garena</a>
                                </li>
                                <li><a href="?admin=service">Edit Server</a>
                                </li>
                                <li><a href="?admin=order">Edit Order</a>
                                </li>
                                <li><a href="?admin=balance">Top Up Saldo Request</a>
                                </li>
                                <li><a href="?reseller=user_add">Tambah User</a>
                                </li>
                                <li><a href="?reseller=transfer">Transfer Saldo</a>
                                </li>
                            </ul>
                        </li>
<? } else if ($level == "Reseller"){ ?>
 <li class="nav-small-cap">Reseller Menu</li>
                        <li class="has_sub"> <a href="#" class="waves-effect"><i class="fa fa-dashcube"></i> <span> Reseller Panel </span> </a>
                            <ul class="list-unstyled">
                                <li><a href="?reseller=user_add">Tambah User</a>
                                </li>
                                <li><a href="?reseller=transfer">Transfer Saldo</a>
                                </li>
                            </ul>
                        </li>
<? } else if ($level == "Agen"){ ?>
 <li class="nav-small-cap">Agen Menu</li>
                        <li class="has_sub"> <a href="#" class="waves-effect"><i class="fa fa-dashcube"></i> <span> Agen Panel </span> </a>
                            <ul class="list-unstyled">
                                <li><a href="?reseller=user_add">Tambah User</a>
                                </li>
                            </ul>
                        </li>
<?php } ?>
                        <li class="nav-small-cap">Main Menu</li>
                        <li> <a href="/"><i class="fa fa-home"></i> <span> Home </span> </a>
                        </li>
                        <li> <a href="?content=new-order"><i class="fa fa-cart-plus"></i> <span> Mulai Order <span class="arrow "></span></a>
                        </li>
                        <li class="has_sub"> <a href="#" class="waves-effect"><i class="fa fa-cart-plus"></i> <span> Game Cash </span> </a>
                            <ul class="list-unstyled">
                                <li><a href="?content=gemscool">Gemscool Cash</a>
                                </li>
                                <li><a href="?content=garena">Shell Garena</a>
                                </li>
                            </ul>
                        </li>
                        <li> <a href="?content=order-history"><i class="glyphicon glyphicon-time"></i></i> <span> Riwayat Order </span> </a>
                        </li>
                        <li> <a href="?content=service-list"><i class="fa fa-list"></i> <span> Daftar Harga <span class="arrow "></span></a>
                        </li>
                        <li class="has_sub"> <a href="#" class="waves-effect"><i class="fa fa-credit-card"></i> <span> Saldo </span> </a>
                            <ul class="list-unstyled">
                                <li><a href="?content=add-balance">Top Up Saldo</a>
                                </li>
                                <li><a href="?content=history-balance">Riwayat Deposit Saldo</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has_sub"> <a href="#"class="waves-effect"><i class="fa fa-gear"></i> <span> Pengaturan </span> </a>
                            <ul class="list-unstyled">
                        <li><a href="?content=contact">Kontak Admin</a>
                                </li>
                                <li><a href="?content=change-password">Ganti Password</a>
                                </li>
<li><a href="logout.php">Keluar</a>
                                </li>
                            </ul>
                        </li>