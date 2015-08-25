<?php if (!defined('THINK_PATH')) exit();?>
<!-- 顶部 -->

	<div class="breadcrumbs" id="breadcrumbs">
						<script type="text/javascript">
							try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
						</script>

						<ul class="breadcrumb">
							<li>
								<i class="icon-home home-icon"></i>
								<a href="/object/index.php/index/index">首页</a>
							</li>
							<li class="active">手机管理</li>
							<li class="active">手机详情</li>
						</ul><!-- .breadcrumb -->

						<div class="nav-search" id="nav-search">
							<form class="form-search" action="/object/index.php/Home/Phones/index" method="post">
								<span class="input-icon">
									<input type="text" name="model" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
									<i class="icon-search nav-search-icon"></i>
								</span>
								<!-- <button><i class="icon-search nav-search-icon"></i></button> -->
							</form>
						</div><!-- #nav-search -->
	</div>

<!-- 手机详情 -->
<block name="moin-layout">
				<div class="row">
					<div class="col-xs-12">
						<div class="table-responsive">
							<table id="sample-table-2" class="table table-striped table-bordered table-hover">
								<thead>
													<tr>
														<!-- <th class="center">
															<label>
																<input type="checkbox" class="ace" />
																<span class="lbl"></span>
															</label>
														</th> -->
														<th style="text-align:center;">序号</th>
														<th style="text-align:center;" width="120px">手机名</th>
														<th  style="text-align:center;">缩略图</th>

														<th style="text-align:center;" class="hidden-480">
															网络/机型</th>
														<th style="text-align:center;" >价格 <font class="hidden-480">- ↓降格=现价</font></th>
														<th style="text-align:center;" class="hidden-480">库存量</th>
														<th style="text-align:center;" class="hidden-480">颜色</th>
														<th style="text-align:center;" class="hidden-480"width="100px">赠品名</th>
														<th style="text-align:center;" class="hidden-480">赠品图</th>
														<th style="text-align:center;">下架 | 修改 | 删除</th>
													</tr>
								</thead>

								<tbody>
				<?php if(is_array($list)): foreach($list as $k=>$cp): ?><tr align="center">																		<!-- <td class="center">																		<label>																				<input type="checkbox" class="ace" />																				<span class="lbl"></span>																			</label>																		</td> -->														<td>																			<?php echo ($num+$k+1); ?>																	</td>																		<td><?php echo ($cp['model']); ?></td>																		<td><img src="/object/Public<?php echo ($cp['pic']); ?>" width="35px" height="40px"></td>																		<td  class="hidden-480"><font color="blue"><?php echo ($cp['network_type']); ?></font>/<font color="red"><?php echo ($cp['special_type']); ?></font></td>																		<td><?php echo ($cp['oldprice']); ?><font class="hidden-480"> - ↓<?php echo ($cp['presentPrice']); ?> = <?php echo ($cp['oldprice']-$cp['presentPrice']); ?></font></td>																	<td class="hidden-480"><?php echo ($cp['count']); ?></td>
																		<td class="hidden-480"><?php echo ($cp['color']); ?></td>
																		<td class="hidden-480"><?php echo ($cp['giftdescribe']); ?></td>
																		<td class="hidden-480"><img src="/object/Public<?php echo ($cp['giftimg']); ?>" width="30px" height="25px"> <font color="red" size="3px">x </font><font color="green" size="4"><?php echo ($cp['giftnum']); ?></font></td>
																		<td>
																			<div class="visible-md visible-lg hidden-sm hidden-xs action-buttons">
																				<a class="blue" href="/object/index.php/Home/Phones/dela/id/<?php echo ($cp['id']); ?>">
																					<i class="icon-ban-circle bigger-150"></i>&nbsp;
																				</a>

																				<a class="green" href="/object/index.php/Home/Phones/increaseSave?id=<?php echo ($cp['id']); ?>">
																					<i class="icon-pencil bigger-150"></i>&nbsp;
																				</a>

																				<a class="red" href="/object/index.php/Home/Phones/del?id=<?php echo ($cp['id']); ?>">
																					<i class="icon-trash bigger-150"></i>&nbsp;
																				</a>
																			</div>

																			<div class="visible-xs visible-sm hidden-md hidden-lg">
																				<div class="inline position-relative">
																					<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown">
																						<i class="icon-caret-down icon-only bigger-120"></i>
																					</button>

																					<ul class="dropdown-menu dropdown-only-icon dropdown-yellow pull-right dropdown-caret dropdown-close">
																						<li>
																							<a href="/object/index.php/Home/Phones/dela" class="tooltip-info" data-rel="tooltip" title="View">
																								<span class="blue">
																									<i class="icon-zoom-in bigger-120"></i>
																								</span>
																							</a>
																						</li>

																						<li>
																							<a href="/object/index.php/Home/Phones/increaseSave?id=<?php echo ($cp['id']); ?>" class="tooltip-success" data-rel="tooltip" title="Edit">
																								<span class="green">
																									<i class="icon-edit bigger-120"></i>
																								</span>
																							</a>
																						</li>

																						<li>
																							<a href="/object/index.php/Home/Phones/del?id=<?php echo ($cp['id']); ?>" class="tooltip-error" data-rel="tooltip" title="Delete">
																								<span class="red">
																									<i class="icon-trash bigger-120"></i>
																								</span>
																							</a>
																						</li>
																					</ul>
																				</div>
																			</div>
																		</td>
																	</tr><?php endforeach; endif; ?>
								</tbody>
												<tr>
													<td colspan="3"><?php echo ($show); ?></td>
												</tr>
											</table>
						</div>
					</div>
				</div>