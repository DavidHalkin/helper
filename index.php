<?php
$title=l('Помощник.рф - Cервис поиска и размещения объявлений об услугах по всей России');
include('header.php'); 
?>
<div class="main">
					<div class="promo_block" style="background: url('<?=$path?>images/home.jpg');">
						<div class="centered_wrapper">
							<div class="row">
								<div class="col-md-9">
									<?if ($user->id==0):?>
									<h1 <?(new Block($this))->edit_html('m1','name')?> ><?=(new Block($this))->name('m1');?> </h1>
									<p <?(new Block($this))->edit_html('m1','text')?> ><?=l('Более 100 000 проверенных специалистов для выполнения ваших бытовых или бизнес задач');?></p>
									<?endif;?>
									<ul class="list-unstyled m-0 d-flex flex-wrap  list_func">
										<li>
											<a href="/tasks?user=1" class="d-block p-4">
												<strong><?=l('Найти исполнителя');?></strong>
												<i class="icn icn-loopa"></i>
											</a>
										</li>
										<?if ($user->id==0):?>
										<li>
											<a href="/register" class="d-block p-4">
												<strong><?=l('Стать исполнителем');?></strong>
												<i class="icn icn-arrow"></i>
											</a>
										</li>
										<?elseif ($user->doer == 0):?>
										<li>
											<a href="/user/<?=$user->id?>?godoer=1" class="d-block p-4">
												<strong><?=l('Стать исполнителем');?></strong>
												<i class="icn icn-arrow"></i>
											</a>
										</li>
										<?endif;?>
										<li>
											<a href="/tasks/create" class="d-block p-4">
												<strong><?=l('Создать задание');?></strong>
												<i class="icn icn-doc"></i>
											</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<?/*
					<form action="tasks" method="post">
					<div class="search_bar py-3 search_bar_at_home">
						<div class="centered_wrapper">
							<div class="form-row">
								<div class="form-group col-12 col-lg-7 mb-3 mb-lg-0">
									<div class="input-group input_group_xs_different">
										<div class="input-group-prepend i_g_p_drop">
											<div class="dropdown">
												<a class="btn btn_white dropdown-toggle " href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													<span class="text-truncate d-block" ><?=l('Объявления');?></span>
												</a>
												<input type="hidden" id="input_type" value="ads">
												<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
													<a class="dropdown-item" OnClick="$('#input_type').val('ads');" href="#"><?=l('Объявления');?></a>
													<a class="dropdown-item" OnClick="$('#input_type').val('users');"  href="#"><?=l('Исполнители');?></a>
													 
												</div>
											</div>
										</div>
										<input type="text" class="form-control" id="inlineFormInputGroupUsername" placeholder="<?=l('Поиск');?>">
									</div>
								</div>
								<div class="form-group col-md-6 col-lg-3 mb-3 mb-md-0">
									<select class="present" name="place_name" data-jcf='{"wrapNative": false, "wrapNativeOnMobile": false}'>
										<option value="v5"><?=l('Россия');?></option>
										<?foreach ($this->db->get_where('region',['country_id'=>3159])->result_array() as $row):?>
										<option value="<?=$row['id']?>"><?=$row['name']?></option>
										<?endforeach;?>
									</select>
								</div>
								<div class="form-group col-md-6 col-lg-2 m-0">
									<button type="submit" class="btn btn-success btn-block"><?=l('Найти');?></button>
								</div>
							</div>
						</div>
					</div>
					</form>
					*/?>
					<?include('inc_search.php')?>
					<div class="centered_wrapper text-center pt-3 popular_category">
						<div class="row">
							<div class="col-6 col-sm-4 col-lg-2 py-3">
								<a href="#">
									<i class="fas fa-home"></i>
									<span class="d-block">Дом</span>
								</a>
							</div>
							<div class="col-6 col-sm-4 col-lg-2 py-3">
								<a href="#">
									<i class="fas fa-truck"></i>
									<span class="d-block">Доставка</span>
								</a>
							</div>
							<div class="col-6 col-sm-4 col-lg-2 py-3">
								<a href="#">
									<i class="fas fa-house-user"></i>
									<span class="d-block">Фриланс</span>
								</a>
							</div>
							<div class="col-6 col-sm-4 col-lg-2 py-3">
								<a href="#">
									<i class="fas fa-book"></i>
									<span class="d-block">Преподаватели</span>
								</a>
							</div>
							<div class="col-6 col-sm-4 col-lg-2 py-3">
								<a href="#">
									<i class="fas fa-business-time"></i>
									<span class="d-block">Бизнес</span>
								</a>
							</div>
							<div class="col-6 col-sm-4 col-lg-2 py-3">
								<a href="#">
									<i class="fas fa-bars"></i>
									<span class="d-block">Все категории</span>
								</a>
							</div>
						</div>
					</div>
					<div class="centered_wrapper pt-4">
						<h2 class="styled_title darken_color mb-5 h1"><span><?=l('Категории услуг');?></span></h2>
						<div class="row">
						 
						<?foreach ((new Service($this))->get_all(9,0,'pos','asc',['parent_id'=>0]) as $service):?>
							<div class="col-12 col-sm-6 col-md-4 col-lg-3 services_item">
								<div class="services_prev">
									<a href="/service/<?=$service['url']?>"><img src="/upload/<?=$service['img']?>"></a>
								</div>  
								<h3><?=$service['name']?></h3>
								<ul class="list-unstyled m-0 it_list">
								<?
								$i=0;
								foreach ((new Service($this))->get_all(999,0,'count','desc',['parent_id'=>$service['id']]) as $sub_service):
								$i++;
								?>
									<li <?if($i>5):?>style="display:none" class="show_more_services"<?endif;?> ><a href="/service/<?=$sub_service['url']?>"><?=$sub_service['name']?></a> <span><?=$sub_service['count'];?></span></li>
								<?endforeach;?> 
									<?if ($i>5):?><li><a OnClick="$('.show_more_services').show();" href="javascript:" class="show_more_link">Показать ещё</a> </li><?endif;?>
								</ul>
							</div>
						<?endforeach;?>
							<div class="col-12 col-lg-9 block_now align-self-end">
								<h3 <?(new Block($this))->edit_html('m2','text')?> ><?=(new Block($this))->name('m2');?> !</h3>
								<ul class="list-unstyled m-0 d-flex flex-wrap  list_func">
									<li>
										<a href="/tasks?input_type=users" class="d-block p-4">
											<strong>Найти исполнителя</strong>
											<i class="icn icn-loopa"></i>
										</a>
									</li>
									<?if ($user->id==0):?>
										<li>
											<a href="/register" class="d-block p-4">
												<strong><?=l('Стать исполнителем');?></strong>
												<i class="icn icn-arrow"></i>
											</a>
										</li>
										<?elseif ($user->doer == 0):?>
										<li>
											<a href="/user/<?=$user->id?>?godoer=1" class="d-block p-4">
												<strong><?=l('Стать исполнителем');?></strong>
												<i class="icn icn-arrow"></i>
											</a>
										</li>
										<?endif;?>
									<li>
										<a href="/tasks/create" class="d-block p-4">
					 						<strong><?=l('Создать задание');?></strong>
											<i class="icn icn-doc"></i>
										</a>
									</li>
								</ul>
							</div>
						</div>
						<h2 class="styled_title darken_color mb-5 h1 mt-5"><span><?=l('Регионы');?></span> <a href="/regions"><?=l('Смотреть все');?></a></h2>
						<ul class="list-unstyled m-0 it_list columns">
						<?foreach ($this->db->limit(24)->get_where('region',['country_id'=>3159])->result_array() as $row):?>
							<li><a href="/region/<?=$row['id']?>"><?=$row['name']?></a> <span><?=(new Users($this))->get_count(['region_id'=>$row['id'] ]);?></span></li>
						<?endforeach;?>  
						</ul>
					</div>
				</div>
				 
			 
		<?include('footer.php');?> 