<div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1><?= ucfirst($this->uri->segment(2)); ?></h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <?php $i=0; ?>
                                    <?php foreach ($this->uri->segments as $segment) : ?>
                                        <?php 
                                            $url = substr($this->uri->uri_string, 0, strpos($this->uri->uri_string, $segment)) . $segment;
                                            $is_active =  $url == $this->uri->uri_string;
                                        ?>
                                        <li class="breadcrumb-item <?php echo $is_active ? 'active': '' ?>">
                                            <?php if($is_active): ?>
                                                <?php echo ucfirst($segment) ?>
                                            <?php else: ?>
                                                <?php echo ucfirst($segment) ?>
                                            <?php endif; ?>
                                            <?php if (++$i == 3) break;?>
                                        </li>
                                    <?php endforeach; ?>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>