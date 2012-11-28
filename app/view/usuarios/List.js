Ext.define('CrudTest.view.usuarios.List', {
	extend: 'Ext.grid.Panel',
	requires: [
		'Ext.toolbar.Paging'
	],
	alias: 'widget.usuarioslist',
	title: 'Listagem de usuários',
	store: 'Usuarios',
	selType: 'cellmodel',
	margin: 10,

	initComponent: function() {
		// as colunas da grid
		this.columns = [
			{header: 'Nome', dataIndex: 'nome', flex: 1},
			{header: 'E-mail', dataIndex: 'email', flex: 1}
		];

		// toolbar superior e paginação
		this.dockedItems = [
			{
				xtype: 'toolbar',
				items: [
					{
						text: 'Novo usuário',
						action: 'add',
						iconCls: 'add'
					},
					{
						text: 'Excluir selecionados',
						action: 'delete',
						iconCls: 'close'
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

		// plugin para checkbox selection
		var sm = Ext.create('Ext.selection.CheckboxModel');
		this.selModel = sm;

		this.callParent(arguments);
	}
});