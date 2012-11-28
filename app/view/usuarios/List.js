Ext.define('CrudTest.view.usuarios.List', {
	extend: 'Ext.grid.Panel',
	requires: [
		'Ext.toolbar.Paging'
	],
	alias: 'widget.usuarioslist',
	title: 'Listagem de usuários',
	store: 'Usuarios',
	margin: 10,

	initComponent: function() {

		this.columns = [
			{header: 'Nome', dataIndex: 'nome', flex: 1},
			{header: 'E-mail', dataIndex: 'email', flex: 1}
		];

		this.dockedItems = [
			{
				xtype: 'toolbar',
				items: [
					{
						text: 'Novo usuário',
						action: 'add',
						iconCls: 'add'
					}
				]
			},
			{
				xtype: 'pagingtoolbar',
				store: 'Usuarios',
				dock: 'bottom',
				displayInfo: true
			}
		];

		var sm = Ext.create('Ext.selection.CheckboxModel');

		this.selModel = sm;

		this.callParent(arguments);
	}
});