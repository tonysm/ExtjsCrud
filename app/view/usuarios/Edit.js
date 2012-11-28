Ext.define('CrudTest.view.usuarios.Edit', {
	extend: 'Ext.window.Window',
	alias: 'widget.usuariosedit',
	requires: [
		'Ext.form.Panel'
	],
	title: 'Editar Usuários',
	layout: 'fit',
	modal: true,
	autoShow: true,

	initComponent: function() {
		this.items = [
			{
				xtype: 'form',
				items: [
					{
						xtype: 'textfield',
						name: 'nome',
						fieldLabel: 'Nome'
					},
					{
						xtype: 'textfield',
						name: 'email',
						fieldLabel: 'E-mail'
					}
				]
			}
		];

		this.buttons = [
			{
				text: 'Salvar',
				action: 'save'
			},
			{
				text: 'Cancelar',
				scope: this,
				handler: this.close
			}
		];


		this.callParent(arguments);
	}
});