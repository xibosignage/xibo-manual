<!--toc=getting_started-->
#CMS Installation
[[PRODUCTNAME]] CMS ist eine PHP Webanwendung, welche auf einer MySQL Datenbank aufsetzt. Die PHP / MySQL Kombination ist sehr populäre Web-Plattform und läuft sowohl auf Linux als auch auf Windows Servern.

Wir stellen Ihnen [hier](install_environment.html) eine grundlegende Installationsanleitung zur Verfügung. Wir empfehlen Ihnen allerdings eine Cloud basierende Lösung bzw. eine Lösung, welchen von einem IT-Dienstleister verwaltet wird, falls Ihre Digital Signage Lösung kritisch ist.

## Installation
Wir nehmen ab diesem Punkt an, dass ein Webserver mit PHP und MySQL bereitsteht und das Archiv (ZIP oder Tarball) des CMS bereits auf den Server heruntergeladen wurde.

Hier eine kurze Zusammenfassung der Installationsschritte:
1. Laden und extrahieren Sie das Archiv
2. Starten Sie die Installation
3. Prüfung ob die Voraussetzungen für die Installation gegeben sind
4. Erstellung der Datenbank
5. Angabe der Datenbank Einstellungen
6. Starten der CMS Installation
7. Finale Konfiguration
8. Fertig

###Laden und extrahieren Sie das Archiv
Das CMS Archiv beinhaltet den Unterordner [[PRODUCTNAME]]-server-[[PRODUCTVERSION]]. Der komplette Inhalt des Ordners muss in das gewünschte Verzeichnis des Webservers kopiert werden. In der einfachsten Konfiguration wird der Name des Ordner dem der URL entsprechen, unter welcher Sie das CMS aufrufen können, z.B: `http://localhost/[[PRODUCTNAME]]`.

Das extrahierte Archiv sollte wie auf folgendem Screenshot aussehen:

![Extrahiertes Archiv](img/win32_install_extracted.png)

Es wird ein Ordner für die [[PRODUCTNAME]] Bibliothek benötigt. Dieser wird für das Speichern von Bildern, Videos und anderen Mediendaten, welche in das CMS hochgeladen werden, verwendet. _Nachfolgende Schritte der Installation benötigen diese Information_

###Start der Installation
Die Installation beginnt automatisch, nachdem Sie folgende Seite aufgerufen haben: `http://localhost/[[PRODUCTNAME]]`.

Sie werden durch die Installation mittels eines _Assistenten_ geleitet. Insgesamt werden 6 Schritte ausgeführt.

### Schritt 1 - Voraussetzungen
Der Installer stellt Ihnen eine Checkliste der wichtigen Installationsvoraussetzungen bereit. Jedes Element wird entsprechend der aktuellen Gegebenheiten markiert:

* Einem Haken - das Element ist installiert und richtig eingestellt
* Einem Ausrufezeichen - das Element ist installiert aber nicht richtig konfiguriert
* Einem Kreuz - das Element ist nicht installiert.

Bitte beachten Sie die Hinweise an den Elementen und versuchen Sie diese richtig zu konfigurieren bzw. die Elemente zu installieren. Anschließend überprüfen Sie die Voraussetzungen erneut, indem Sie auf den "Retest"-Button klicken.

![Installation Schritt 1](img/install_cms_step1.png)

Die meisten Probleme, welche in diesem Schritt auftreten, sind folgende: Fehlende PHP Module, fehlerhafte PHP Konfiguration und fehlende Lese- und Schreibberechtigungen für den Bibliothek-Ordner.

Nachdem alle Elemente mit einem Haken gekennzeichnet sind, klicken Sie auf "Weiter" um mit der Installation fortzufahren.

###Erstellen der Datenbank
Das CMS kann eine neue Datenbank anlegen oder eine existierende DB verwenden. Wir empfehlen Ihnen eine neue DB erstellen zu lassen.

[[PRODUCTNAME]] fügt keinen Präfix an die Tabellennamen. Dies kann zu Konflikten mit bestehenden Datenbanken führen.

Wählen Sie zwischen den zwei verfügbaren Tabs, um festzulegen, ob eine neue Datenbank erstellt werden soll oder ob eine existierende DB verwendet werden soll.

###Datenbank Einstellungen
Egal ob Sie eine neue DB erstellen oder eine existierende verwenden, müssen Sie dem Installer einige Informationen bezüglich der Datenbank geben, damit sich das CMS mit der Datenbank verbinden kann.

![Installation Schritt 2](img/install_cms_step2.png)

Der Installer benötigt folgende Informationen:

**Host**
Der Hostname Ihrer MySQL Installation - Dies sollte in den meisten Fällen "localhost" entsprechen.

**Admin Benutzername**
Der "root" Benutzername Ihrer MySQL Installation. Dies wird einmalig für die Erstellung der Datenbank benötigt.

**Admin Passwort**
Das "root" Passwort. Wird einmalig für die Erstellung der DB benötigt.

**Datenbankname**
Der Name für die CMS Datenbank.

**Datenbank Benutzername**
Der Benutzername für die DB, welcher vom CMS für die Verbindung zur DB genutzt wird. Hier können Sie z.B. den gleichen Namen wie den Datenbanknamen vergeben.

**Datenbank Passwort**
Das Passwort, welches für die Verbindung zur DB verwendet wird.


###Start der Installation
Der Installer wird nun die DB anlegen / mit Inhalt versehen. Dies kann einige Augenblicke dauern. Wenn alles angelegt wurde, klicken Sie auf "Weiter".

_Sollten Fehler aufgetreten werden, gehen Sie zur Kategorie "Fehlerbehebung" dieses Handbuchs._

###Admin Passwort
Jede Installation benötigt mindestens einen "Super User" Administrator um das System zu verwalten, Updates einzuspielen oder erweiterte Einstellungen vorzunehmen. Dieser Benutzer wird im dritten Schritt der Installation angelegt.

![Installation Schritt 3](img/install_cms_step3.png)

**Der Benutzername und das Passwort dieses Benutzers sollten geheim gehalten werden. Die Benutzerdaten werden nach der Installation zur Erstanmeldung benötigt.**


###Einstellungen
Die nächste Seite behandelt die Einstellungen von [[PRODUCTNAME]]. Das erste Feld verlangt nach dem Speicherort an dem [[PRODUCTNAME]] die hochgeladenen Medien speichern wird. Wir haben diesen Ordner bereits erstellt. Geben Sie hier z.B. `/home/[[PRODUCTNAME]]/library` ein.

In der nächsten Box wird der CMS Schlüssel angegeben - dieser Schlüssel dient zur Registrierung neuer Bildschirme am CMS und sollte möglichst ungewöhnlich sein. 

Mit der Auswahlbox legen Sie fest, ob Sie anonyme Statistiken an das [[PRODUCTNAME]] Projekt senden wollen. Wir würden uns sehr darüber freuen!

![Installation Schritt 4](img/install_cms_step4.png)

###Fertig
Die Installation ist nun fertig und Sie können sich in das System einloggen.

![Installation komplett](img/install_cms_complete.png)