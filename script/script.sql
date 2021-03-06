USE [BDCamping]
GO
/****** Object:  Table [dbo].[Administrateur]    Script Date: 30/04/2021 15:27:37 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Administrateur](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[login_administrateur] [varchar](50) NOT NULL,
	[mdp_administrateur] [varchar](30) NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY],
UNIQUE NONCLUSTERED 
(
	[login_administrateur] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Chalet]    Script Date: 30/04/2021 15:27:37 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Chalet](
	[id_chalet] [int] IDENTITY(1,1) NOT NULL,
	[id_type_chalet] [int] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[id_chalet] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Client]    Script Date: 30/04/2021 15:27:37 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Client](
	[id_client] [int] IDENTITY(1,1) NOT NULL,
	[nom] [text] NOT NULL,
	[prenom] [text] NOT NULL,
	[date_naissance] [date] NOT NULL,
	[mail] [varchar](150) NOT NULL,
	[telephone] [varchar](50) NULL,
	[adresse] [text] NULL,
	[cp_ville] [varchar](50) NOT NULL,
	[mdp_client] [varchar](30) NOT NULL,
	[ville] [varchar](58) NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[id_client] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY],
UNIQUE NONCLUSTERED 
(
	[mail] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Prix_special]    Script Date: 30/04/2021 15:27:37 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Prix_special](
	[id_chalet] [int] NOT NULL,
	[id_semaine] [int] NOT NULL,
	[prix_modifie] [decimal](15, 2) NULL,
PRIMARY KEY CLUSTERED 
(
	[id_chalet] ASC,
	[id_semaine] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Reservation]    Script Date: 30/04/2021 15:27:37 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Reservation](
	[id_client] [int] NOT NULL,
	[id_chalet] [int] NOT NULL,
	[id_semaine] [int] NOT NULL,
	[valide] [bit] NULL,
	[date_reservation] [date] NULL,
PRIMARY KEY CLUSTERED 
(
	[id_client] ASC,
	[id_chalet] ASC,
	[id_semaine] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Saison]    Script Date: 30/04/2021 15:27:37 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Saison](
	[id_saison] [int] IDENTITY(1,1) NOT NULL,
	[type] [varchar](50) NULL,
	[taux] [decimal](15, 2) NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[id_saison] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Semaine]    Script Date: 30/04/2021 15:27:37 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Semaine](
	[id_semaine] [int] IDENTITY(1,1) NOT NULL,
	[numero_semaine] [int] NULL,
	[date_debut] [date] NULL,
	[annee] [int] NULL,
	[date_fin] [date] NULL,
	[id_saison] [int] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[id_semaine] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Type_chalet]    Script Date: 30/04/2021 15:27:37 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Type_chalet](
	[id_type_chalet] [int] IDENTITY(1,1) NOT NULL,
	[libelle] [varchar](50) NULL,
	[prix_base] [decimal](15, 2) NOT NULL,
	[nb_place] [int] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[id_type_chalet] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
ALTER TABLE [dbo].[Chalet]  WITH CHECK ADD FOREIGN KEY([id_type_chalet])
REFERENCES [dbo].[Type_chalet] ([id_type_chalet])
GO
ALTER TABLE [dbo].[Prix_special]  WITH CHECK ADD FOREIGN KEY([id_chalet])
REFERENCES [dbo].[Chalet] ([id_chalet])
GO
ALTER TABLE [dbo].[Prix_special]  WITH CHECK ADD FOREIGN KEY([id_semaine])
REFERENCES [dbo].[Semaine] ([id_semaine])
GO
ALTER TABLE [dbo].[Reservation]  WITH CHECK ADD FOREIGN KEY([id_chalet])
REFERENCES [dbo].[Chalet] ([id_chalet])
GO
ALTER TABLE [dbo].[Reservation]  WITH CHECK ADD FOREIGN KEY([id_client])
REFERENCES [dbo].[Client] ([id_client])
GO
ALTER TABLE [dbo].[Reservation]  WITH CHECK ADD FOREIGN KEY([id_semaine])
REFERENCES [dbo].[Semaine] ([id_semaine])
GO
ALTER TABLE [dbo].[Semaine]  WITH CHECK ADD FOREIGN KEY([id_saison])
REFERENCES [dbo].[Saison] ([id_saison])
GO
