<div class="fl-loop-data-source-<?php echo $slug ?> fl-loop-data-source" data-source="<?php echo $slug ?>">
    <table class="fl-form-table">
		<?php foreach ( $source['fields'] as $name => $field ): ?>
			<?php FLBuilder::render_settings_field( $name, $field, $settings ); ?>
		<?php endforeach; ?>
    </table>
</div>
