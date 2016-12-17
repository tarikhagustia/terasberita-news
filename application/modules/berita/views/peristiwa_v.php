<ul class="list-unstyled">
  <?php foreach ($list as $key => $value): ?>
    <li>
      <span class="rate" href="javascript:void(0)"><?= $key+1; ?></span>
      <p><a href="<?= base_url('teras-peristiwa/'. $value->fokus_url) ?>"><?= $value->fokus_name ?></a></p>
    </li>
  <?php endforeach; ?>
</ul>
