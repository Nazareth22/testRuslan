<?php


class Output
{
    public function __construct(private Connection $connection)
    {
    }

    public function select()
    {
        $output = $this->connection->getData();

        if ($output) {
            $rowsCount = $output->rowCount(); // количество полученных строк

            $table = "<p>Получено объектов: $rowsCount</p>";
            $table .= "<table><tr><th>first_name</th><th>last_name</th><th>middle_name</th><th>age</th></tr>";

            foreach ($output as $row) {
                $table .= "<tr>";
                $table .= "<td>" . $row["first_name"] . "</td>";
                $table .= "<td>" . $row["last_name"] . "</td>";
                $table .= "<td>" . $row["middle_name"] . "</td>";
                if ($row["age"] > 60) {
                    $table .= "<td class='red'>" . $row["age"] . "</td>";
                } else {
                    $table .= "<td>" . $row["age"] . "</td>";
                }
                $table .= "</tr>";
            }
            $table .= "</table>";
            echo $table;
        }
    }
}
